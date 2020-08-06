<?php  namespace App\Services;

use App\Models\Blog;
use App\User;
use Auth;

class BlogServices{

	public function getBlogByUserId($id)
	{
		return Blog::where('user_id' , $id)->get();
	}

	public function storeBlog($data)
	{
	   	    $user_id = Auth::User()->id;
	        $blog = new Blog;
	        $blog->title = $data['title']; 
	        $blog->desc = $data['desc']; 
	        $blog->date = $data['date']; 
	        $blog->user_id = $user_id; 

	        if (isset($data['image'])) {
	          $img = $data['image'];  
	          $filename = $img->getClientOriginalName();
	          $blog->image = $img->storeAs('images/blog' , $filename , 'public');
	        }
	        $blog->save();
	}
}