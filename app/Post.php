<?php

namespace App;

use App\Category;
use App\Tag;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class Post extends Model
{

    use Sluggable;

    protected $fillable = ['title','slug','body','category_id'];
    protected $with = ['category','tags'];
    protected $appends = ['commentsCount'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
    * Get the comments of a post
    */
    public function getComments()
    {
        return  $this->comments->groupBy("parent_id");
    }

    /**
    * Get the count of comments of a post
    */
    public function getCommentsCountAttribute()
    {
        return $this->comments->count();
    }

     /**
    * Return the trending posts of the month
    */
    public static function getTrending()
    {
        return Post::hydrate(
                array_map("json_decode", Redis::zrevrange('trending_posts', 0, 2))
        );
    }

    /**
    * Filter a post according to its filters
    */
    public function scopeFilters($query, $filters)
    {
        return $filters->apply($query);
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
