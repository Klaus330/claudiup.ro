<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name','experience_level'];

    /*
    * Relationship with projects
    */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
