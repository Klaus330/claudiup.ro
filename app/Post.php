<?php

namespace App;

use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    protected $fillable = ['title','slug','body','category_id'];

    /*
    * Relationship with comments
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /*
    * Relationship with categories
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    * Relationship with tags
    */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
    * Return the post archives arrays
    */
    public static function archives()
    {
        return static::selectRaw("year(created_at) year, monthname(created_at) month, count(*) published")
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at) desc')
                    ->get()
                    ->toArray();
    }

    /**
    * Filter the posts
    */
    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

        if ($category = $filters['category']) {
            $category_id = Category::where('name', $category)->first()->id;
            $query->where('category_id', $category_id);
        }

        if ($key = $filters['keyword']) {
            $query->where('body', 'LIKE', '%'.$key.'%')->orWhere('title', 'LIKE', '%'.$key.'%');
        }
    }

     public function getComments()
    {
        $comments = $this->comments->groupBy("parent_id");
        return $comments;
    }

    /**
    * Save the thumbnail of a post
    * @param App\Post $post
    */
    public function saveImage(Request $request, Post $post)
    {
        $img = $request->file('thumbnail');
        $filename = time() . '.' . $img->getClientOriginalExtension();
        $location = public_path("images/thumbnail/" . $filename);
        Image::make($img)->resize(748, 364)->save($location);

        $post->thumbnail = $filename;
        $post->save();
    }

    /**
    * Update the thumbnail of the post
    * @param App\Post $post
    */
    public function updateImage(Request $request, Post $post)
    {
        $oldfilename = $post->thumbnail;

        $img = $request->file('thumbnail');

        $filename = time() . '.' . $img->getClientOriginalExtension();

        $location = public_path("images/thumbnail/" . $filename);
        Image::make($img)->resize(748, 364)->save($location);

        $oldlocation = public_path("images/thumbnail/" . $oldfilename);

        File::delete($oldlocation);

        $post->thumbnail = $filename;

        $post->save();
    }
}
