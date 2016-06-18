<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::orderBy('id', 'asc')->paginate(20);
        return view("tag.index",compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("tag.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:tags',

        ]);

        $tag = New Tag();
        $tag->name = $request->input('name');
        $tag->description = $request->input('description');
        $tag->save();
        return redirect()->route("tag.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tag = Tag::findorfail($id);
        $posts = $tag->posts()
            ->orderBy('id', 'desc')
            ->paginate(5);
//        $catblog = Post::where('category_id', $id)
//            ->orderBy('id', 'desc')
//            ->paginate(5);
        return view("tag.show",compact('tag','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findorfail($id);
        return view("tag.edit",compact('tag'));
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

        $tag = Tag::findorfail($id);
        $tag->name = $request->input('name');
        $tag->description = $request->input('description');
        $tag->save();
        return redirect()->route("tag.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::findorfail($id);
        $tag->delete();
        return redirect()->route("tag.index");
    }
}
