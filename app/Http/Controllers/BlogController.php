<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $blogs = Blog::orderBy('id', 'desc')->paginate(5);
         return view("blog.index")
            ->with("blogs", $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required|max:255|unique:blogs',
                'body' => 'required',
                'category' =>'required|max:255',
            ]);

            $blog = New Blog();
            $blog->title = $request->input('title');
            $blog->body = $request->input('body');
            $blog->category_id = $request->input('category');
            $blog->save();
            return redirect()->route("blog.index");
            
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   
        $blog = Blog::findorfail($id);
        
        return view("blog.show",compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $blog = Blog::findorfail($id);
        return view("blog.edit",compact('blog'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required',
                'category' =>'required|max:255',
            ]);

            
            $blog = Blog::findorfail($id);
            $blog->title = $request->input('title');
            $blog->body = $request->input('body');
            $blog->category_id = $request->input('category');
            $blog->save();
            return redirect()->route("blog.index");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog = Blog::findorfail($id);
        $blog->delete();
        return redirect()->route("blog.index");

    }
}
