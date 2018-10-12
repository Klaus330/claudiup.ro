<?php

namespace App;

use App\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
    *   Publish a new post
    */
    public function publish(Post $post,$tags){
        
        $this->posts()->save($post);

        $post->tags()->sync($tags, false);   
    }
}
