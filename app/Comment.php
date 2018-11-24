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

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id')->get();
    }

    public function parent(){
        return  $this->belongsTo(Comment::class,'parent_id')->get();
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

        if($request->has('parent_id')){
            $comment->parent_id = $request['parent_id'];
        }
        
        $comment->save();
    }

    public function getUsername()
    {
        return $this->name;
    }
}
