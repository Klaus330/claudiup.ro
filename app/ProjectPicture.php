<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPicture extends Model
{
    protected $table = 'project_images';

    /**
    * Relationship with Projects
    */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
