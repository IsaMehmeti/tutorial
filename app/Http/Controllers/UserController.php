<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Services\UserService;
use Auth;
use App\Http\Requests\UpdateUserRequest;
use File;


class UserController extends Controller
{
   protected $userService;

   function __construct(UserService $userService)
    {
      $this->userService = $userService;
    }

    public function profile()
    {
        $user = $this->userService->getUserById(Auth::id());
        return view('user.profile', compact('user'));
    }

    public function showProfile()
    {   

        $user = $this->userService->getUserById(Auth::id());
        return view('user.index', compact('user'));
    }


    public function updateProfile($id, UpdateUserRequest $request)
    {	
      $data = $request->all();
    	$this->userService->completeUser($id, $data);

        $user = $this->userService->getUserById(Auth::id());
        if ($user->completion == 100) {
       return redirect()->route('dashboard')->with('alert-info','Profile Completed 100%. Congratulations you are now a Blogger');
        }else{
    	 return redirect()->route('dashboard')->with('status','Completed Successfully');
        }

    
    }
     public function editProfile($id, UpdateUserRequest $request){
        $data = $request->all();
        $this->userService->editProfile($id, $data, $request);
          return redirect()->back()->with('alert-success', 'Changed Successfully');
            }

     public function deleteImage($img)
      {
          $filename =public_path().'/storage/'.$img;
          File::delete($filename);
      }

      }
  
