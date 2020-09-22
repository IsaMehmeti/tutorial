<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Blog;
use App\Services\UserService;
use App\Services\BlogServices;

class TestController extends Controller
{

     protected $userService;

   function __construct(UserService $userService, BlogServices $blogservices)
    {
      $this->userService = $userService;
      $this->blogservices = $blogservices;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('test');
    }
    public function getData($id=0)
    {   

        if ($id == 0) {
            $arr['data'] = User::all();
        }else{
            $arr['data'] = User::where('id', $id)->first();
        }
        echo json_encode($arr);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $blog = new Blog;
        $blog =Blog::create($data=$request->all());
        return response()->json(['blog' => $blog]);
            print_r('saved');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
       $this->userService->deleteUserById($id);
       return response()->json();
    } 



}
