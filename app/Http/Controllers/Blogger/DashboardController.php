<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('blogger.index' , [
    		'admin_count' => User::where('type', '1')->count(),
    		'blogger_count' => User::where('type', '2')->count(),
    		'user_count' => User::where('type' , '>=','3')->count(),
            'favorite_count' => User::where('favorite', '1')->count(),
            'blog_count' => Blog::count(),
            'blogs' => Blog::all(),
    	]);
    }
}
