<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    /**
    * Relationship with posts
    */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
    * Return the route key name
    */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
