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
       return response()->json(Post::latest()->paginate(5));
    }
    
}
