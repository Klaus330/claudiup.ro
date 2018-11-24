<?php
namespace App\Filters;

use App\Category;
use App\Filters\Filters;
use Carbon\Carbon;

/**
 *  Thread Filter class
 */
class PostFilter extends Filters
{
    protected $filters = ['month','year','category','keyword'];

    public function month($month)
    {
        return $this->builder->whereMonth('created_at', Carbon::parse($month)->month);
    }

    public function year($year)
    {
        return $this->builder->whereYear('created_at', $year);
    }

    public function category($category)
    {
        $category_id = Category::where('name', $category)->first()->id;
        return $this->builder->where('category_id', $category_id);
    }

    public function keyword($key)
    {
        return $this->builder->where('body', 'LIKE', '%'.$key.'%')->orWhere('title', 'LIKE', '%'.$key.'%');;
    }
}
