<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $fillable = ['name','email','message'];

    /**
    *   Relationship with posts
    */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
    *  Sore a newly resource in storage
    *   @param string $slug
    */
    public static function store(Request $request, $slug)
    {
        $post_id = Post::where("slug", $slug)->first()->id;
        $comment = new Comment();

        $comment->name = $request['name'];
        $comment->email = $request['email'];
        $comment->message = $request['message'];
        $comment->post_id = $post_id;
        
        $comment->save();
    }
}
