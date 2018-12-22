<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $comments = Comment::latest();
        return view("admin.comments.table", compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.comments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     *
     */
    public function store(Post $post)
    {  

        request()->validate([
            "name" => "required|string",
            'email'=>"required|string",
            'message'=>'required'
        ]);
                
        Comment::store(request(), $post->id);

        if(request()->wantsJson()){
            return response("Your comment has been stored. Wait for an admin confirmation,now.",201);
        }

        return redirect()->route("blog.show", ['slug'=>$post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back();
    }

    /*
    * Update the validate column from the table
    */
    public function validated(Comment $id)
    {
        $id->validated = true;
        $id->save();
        return back();
    }
}
