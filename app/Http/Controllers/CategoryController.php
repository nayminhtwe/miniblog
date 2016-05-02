<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(20);
        return view("category.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories',

        ]);

        $category = New Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect()->route("cat.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findorfail($id);
        $catname = Category::find($id);
        $catblog = Blog::where('category_id', $id)
               ->orderBy('id', 'desc')
               ->paginate(5);
        return view("category.show",compact('catblog','catname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view("category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',

        ]);

        $category = Category::findorfail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect()->route("cat.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->route("cat.index");
    }
}
