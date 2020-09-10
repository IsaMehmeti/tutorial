<?php

namespace App\Http\Controllers;
use App\User;
use App\Models\Blog;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
    	return view('dashboard' , [
    		'admin_count' => User::where('type', '1')->count(),
    		'blogger_count' => User::where('type', '2')->count(),
    		'user_count' => User::where('type' , '>=','3')->count(),
            'favorite_count' => User::where('favorite', '1')->count(),
            'blog_count' => Blog::count(),
            'blogs' => Blog::all(),
    	]);
    }
}
