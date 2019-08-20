<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
	public function getPostSlug($id)
	{
		return Post::where('id',$id)->pluck('slug')->first();
	}
	
    public function index(){

    	$posts = Post::latest()->paginate(5)->map(function($post){
    		return collect($post->toArray())
    				->only(["title","slug"])
    				->all();
    	});

       return $posts;
    }
    
}
