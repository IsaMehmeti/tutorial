<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use App\Services\BlogServices;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogStoreRequest;
use Auth;

class BlogsController extends Controller
{
    protected $blogServices;
    
    public function __construct(BlogServices $blogServices)
    {       
        $this->blogServices = $blogServices;
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $blogs = $this->blogServices->getBlogByUserId(Auth::id());
        return view('blogger.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return S\Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogger.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BlogStoreRequest $request)
    {
        $data = $request->all();
        $this->blogServices->storeBlog($data);
        return redirect()->route('bloggerblog.index')->with('status', 'Created Successfully');
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
        $data = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->desc = $data['desc'];
        $blog->update();
        return response()->json($blog);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->blogServices->deleteBlogById($id);
        return redirect()->back()->with('danger','Deleted Successfully');
    }
}
