<?php  namespace App\Services;

use App\Models\Blog;
use App\User;
use Auth;
Use \Carbon\Carbon;
use File;

class BlogServices{

	public function getBlogByUserId($id)
	{
		return Blog::where('user_id' , $id)->get();
	}

	public function storeBlog($data)
	{
	        $dt = Carbon::now(); 
	        $dt->toDateString();
	   	    $user_id = Auth::User()->id;
	        $blog = new Blog;
	        $blog->title = $data['title']; 
	        $blog->date = $dt; 
	        $blog->desc = $data['desc']; 
	        $blog->user_id = $user_id; 

	        if (isset($data['image'])) {
	          $img = $data['image'];
              $filename  = str_slug(time(), '-').'-'.$img->getClientOriginalName();
              $path = public_path().'/images/blogs/'.$filename;
              $upload_success = \Image::make($img->getRealPath())->fit(350,230)->save($path);
              $blog->image = $filename;
	        }
	        $blog->save();
	}	
		public function deleteBlogById($id)
		{
			$blog = Blog::find($id);
			 if(isset($blog->image)){
            $img = $blog->image;
            $this->deleteImage($img);
            }
			$blog->delete();
		}
	 
	     public function deleteImage($img)
        {
            $filename =public_path().'/images/blogs/'.$img;
            File::delete($filename);
        }
}