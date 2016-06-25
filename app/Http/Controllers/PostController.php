<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Tag;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        /**
         * Check the user authentication for the PostController.
         *
         */
       $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->paginate(5);
         return view("post.index")
            ->with("posts", $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $tags = Tag::lists('name','id');
        return view("post.create",compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
                'title' => 'required|max:255|unique:posts',
                'body' => 'required',
            ]);

            $post = New Post();
            $post->user_id = Auth::id();
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save ();
//            Auth::user()->posts()->save($post);
            $tagsIds = $request->input('tag_list');
        /**
         * Add the lists of tags into the database.
         *
         */
            $post->tags()->attach($tagsIds);

//            session()->flash('flash_message','Your article has been created!');
        return redirect()->route("post.index")->with([
               'flash_message' =>'Your article has been created',
               'flash_message_important' => true

           ]);
            
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   
        $post = Post::findorfail($id);
        
        return view("post.show",compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        $tags = Tag::lists('name','id');
        return view("post.edit",compact('post','tags'));
        
        
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
            ]);

            
            $post = Post::findorfail($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();

            $tagsIds = $request->input('tag_list');
        /**
         * Delete and Sync the list of tags into the database.
         *
         */
            if(is_null($tagsIds))
            {
                $post->tags()->detach();
            }
            else
            {
                $post->tags()->sync($tagsIds);
            }
            return redirect()->route("post.index");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->route("post.index");

    }
}
