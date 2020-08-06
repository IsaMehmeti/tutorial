<?php
namespace App\Services;

use App\User;
use Auth;
use File;

class UserService
{
     //show Bloggers
    public function getAllBloggers(){
        return User::with('mygroups')->where('type', '2')->orderBy('name', 'asc')->get();
    }

    //show Administrators
    public function getAllAdministrators(){
      return User::where('type', '1')->where('id', '!=', Auth::Id())->orderBy('name', 'asc')->get();
    } 
    //Get a user by its id
     public function getUserById($id){
        return User::find($id);
    }
    //Count
    public function countByType($type){
      return User::where('type', $type)->count();
    }

     public function completeUser($id, $data){
        $user = User::find($id);
            $user->name = $data['name'];
            $user->email = $data['email'];
        $percentage = $user->completion;
         if (!isset($user->job)) {
            if(isset($data['job'])){
             $user->job = $data['job'];
         $percentage += 20;
             }
           }else{
            if(isset($data['job'])){
         $user->job = $data['job'];
           }
           }
            if (!isset($user->birth)) {
          if(isset($data['birth'])){
         $user->birth = $data['birth'];
         $percentage += 20;
           }
         }else{
             if(isset($data['birth'])){
         $user->birth = $data['birth'];
           }
         }
           if (!isset($user->image)) {
            if(isset($data['image'])){
                $img = $data['image'];
                $filename = $img->getClientOriginalName();
                $user->image = $img->storeAs('images/user' , $filename , 'public');
            $percentage += 20;
            }
        }else{
          if(isset($data['image'])){
            $img = $data['image'];
            $filename = $img->getClientOriginalName();
            $user->image = $img->storeAs('images/user' , $filename , 'public');
          }
        }
         if($user->completion < 101){
          $user->completion = $percentage;
          }
        $user->save();
          if ($user->completion == 100) {
              $user->type = 2;
              $user->save();
          }
        }

        public function editProfile($id, $data, $request)
        {
           $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];

        if(isset($data['password']))
        {
          $user->password = bcrypt($data['password']);
        }
          if(isset($data['job']))
          {
         $user->job = $data['job'];
           }
          if(isset($data['birth']))
          {
             $validatedData = $request->validate([
            'birth' => 'required|date|before:-18 years',
          ]);          
         $user->birth = $data['birth'];
           }
          $user->save();
        }

        public function deleteUserById($id)
        {
            $user = User::find($id);
            if(isset($user->image)){
            $img = $user->image;
            $this->deleteImage($img);
            }
            $user->delete();
        }
          public function deleteImage($img)
        {
            $filename =public_path().'/storage/'.$img;
            File::delete($filename);
        }

}
