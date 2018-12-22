<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $guarded = [];


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
    public static function store(Request $request, $id)
    {
        $comment = Comment::create([
            'name' => request('name'),
            'email' => request('email'),
            'message' => request('message'),
            'post_id' => $id
        ]);

        if($request->has('parent_id')){
            $comment->update(request(['parent_id']));
        }
     
    }

    public function getUsername()
    {
        return $this->name;
    }
}
