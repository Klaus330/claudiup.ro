<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Upload\Picture;

class Project extends Model
{
    protected $with=['skills','images','pdf'];

    /*
    * Relationship with skills
    */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /*
    * Relationship with project pictures for Image and Slide Project
    */
    public function images()
    {
        return $this->hasMany(ProjectPicture::class);
    }

    public function pdf()
    {
        return $this->hasOne(PdfFile::class, 'project_id');
    }

    /*
    * Save the thumbnail of the project
    */
    public function saveThumbnail(Request $request, Project $project)
    {
        $filename = Picture::store("thumbnail", "images/thumbnail/projects/");
        $project->thumbnail = $filename;
    }

    /*
    * Update the thumbnail of the project
    */
    public function updateThumbnail(Request $request, Project $project)
    {
        $filename = Picture::update($project, "thumbnail");

        $project->thumbnail = $filename;

        $project->save();
    }

    /*
    * Save the images for the SlideProject
    */
    public function savePicture(Project $project, $image)
    {
        ProjectPicture::create([
            'project_id' => $project->id,
            'location' => Picture::storeImages($image, $path = "images/projects")
        ]);

        sleep(1); // makes a delay between photos so they don't overwrite
    }

    public function deletePictures(Project $project)
    {
        foreach ($project->images as $image) {
            Picture::delete("images/projects/{$image->location}");
        }
    }

    /*
    * Format the url for the Youtube Video Projects
    */
    public function formatUrl($url)
    {
        $string     = $url;
        $search     = '#(.*?)(?:href="https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch?.*?v=))([\w\-]{10,12}).*#x';
        $replace    = 'http://www.youtube.com/embed/$2';
        $url        = preg_replace($search, $replace, $string);
        return $url;
    }
}
