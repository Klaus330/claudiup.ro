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

    	$posts = Post::latest()->paginate(10)->map(function($post){
    		return collect($post->toArray())
    				->only(["title","slug",'body',"thumbnail", "created_at"])
    				->all();
    	});

       return $posts;
    }
    
    public function show($slug)
    {   
        $post = collect(
                    Post::where("slug",$slug)->first()->toArray()
                )->only(["title","slug",'body',"thumbnail", "created_at"]);
        
        return $post;
    }    
}
