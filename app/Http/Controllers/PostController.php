<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/* 
	* Display a table with all the latest posts
	*/
	public function table()
	{
		$posts = Post::latest()->paginate(10);
		return view('admin.posts.table',compact('posts'));
	}

	/* 
	* Display the create form
	*/
	public function create()
	{
		$categories = Category::pluck("name",'id');
		$tags = Tag::pluck("name",'id');
		return view('admin.posts.create',compact("categories",'tags'));
	}

	/** 
	* Store a new post in the database
	* @param  \Illuminate\Http\Request  $request
	*/
	public function store(Request $request)
	{
		$this->validate(request(),[
			'title' => 'required|string',
			'slug'=>'required|alpha_dash|unique:posts,slug',
			'category_id'=>	'required|integer',
			'thumbnail'=>'image|sometimes',
			'body'=>'required'
		]);

		$post = Post::create(request(['title','slug','thumbnail','category_id','body']));

		if ($request->thumbnail)
    	{	
    		$post->saveImage($request,$post);
    	}else{
    		throw new Exception("The post must have a thumbnail!", 1);
    	}

		$post->tags()->sync(request('tags'), false);

		return redirect()->route("posts.table");
		}

		/** 
		* Display the edit form
		* @param string $slug
		*/
		public function edit($slug)
		{
			$post = Post::where('slug',$slug)->first();
			$categories = Category::all();
			$tags = Tag::pluck("name",'id');
			return view('admin.posts.edit',compact('post','categories','tags'));
		}

		/** 
		* Update a post from the database
		* @param  \Illuminate\Http\Request  $request
		* @param string $slug
		*/
		public function update(Request $request, $slug)
		{	
			$this->validate(request(),[
				'title' => 'required|string',
				'slug'=>'required|alpha_dash',
				'category_id'=>	'required|integer',
				'body'=>'required'
			]);

			$post = Post::where('slug',$slug)->first();
			$post->update(request(['title', 'body', 'slug', 'category_id','body']));

			if ($request->thumbnail)
        	{
        		$post->updateImage($request,$post);
        	}

			$post->tags()->sync(request('tags'), false);

			return redirect()->route('posts.table');
		}

		/** 
		* Delete an existing post
		* @param string
		*/
		public function delete($slug)
		{
			$post = Post::where('slug',$slug)->first();
			$post->tags()->detach(request('tags'));
			File::delete(public_path("images/thumbnail/" . $post->thumbnail));
			$post->delete();
			return back();
		}
}
