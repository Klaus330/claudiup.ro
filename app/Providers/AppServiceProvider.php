<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Message;
use App\Post;
use App\Project;
use App\Skill;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.includes.sidebar', function ($view) {
            $categories = Category::has('post')->pluck('name');
            $archives = Post::archives();
            $trending = Post::getTrending();
            $tags = Tag::has('posts')->pluck('name');
            $view->with(compact('categories', 'archives', 'trending', 'tags'));
        });

        view()->composer('pages.includes.about.skills', function ($view) {
            $skills = Skill::all();
            $view->with(compact('skills'));
        });

        view()->composer('home.index', function ($view) {
            $projects = Project::all(); 
            $view->with(compact("projects"));
        });
      
        view()->composer('admin.messages.partials.table', function ($view) {
            $messages = Message::latest()->paginate(5);
            $view->with(compact("messages"));
        });

        view()->composer('admin.comments.partials.table', function ($view) {
            $comments = Comment::with('post')->latest()->paginate(5);
            $view->with(compact("comments"));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->isLocal()){
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
