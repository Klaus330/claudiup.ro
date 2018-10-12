<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	/*
	* Display the blog page
	*/
	public function index()
	{	
		$posts = Post::latest()->filter(request())->paginate(3);
	
		return view('blog.index', compact('posts'));
	}	

	/*
	*	Show a single post view
	*   @param string
	*/
	public function showPost($slug)
	{
		/* Find the post after url
		*  e.g. www.my-website.com/blog/[my-first-post]
		*/ 
		$post = Post::where('slug', $slug)->first();
		return view("blog.showPost", compact('post'));
	}
}
