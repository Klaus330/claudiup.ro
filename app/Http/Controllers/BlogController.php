<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
        
        $comments = $post->getComments();
        $comments_count = $post->comments()->count();
        
    
        Redis::zincrby("trending_posts", 1, $post);

        return view("blog.showPost", compact('post','comments','comments_count'));
    }
}
