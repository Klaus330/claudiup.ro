<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
        $img = $request->file('thumbnail');
        $filename = time() . '.' . $img->getClientOriginalExtension();
        $location = public_path("images/thumbnail/projects/" . $filename);
        Image::make($img)->fit(543, 400)->save($location);

        $project->thumbnail = $filename;
    }

    /*
    * Update the thumbnail of the project
    */
    public function updateThumbnail(Request $request, Project $project)
    {
        $oldfilename = $project->thumbnail;

        $img = $request->file('thumbnail');

        $filename = time() . '.' . $img->getClientOriginalExtension();

        $location = public_path("images/thumbnail/projects" . $filename);
        Image::make($img)->fit(543, 400)->save($location);

        $oldlocation = public_path("images/thumbnail/projects" . $oldfilename);

        File::delete($oldlocation);

        $project->thumbnail = $filename;

        $project->save();
    }


    /*
    * Save the images for the SlideProject
    */
    public function savePicture(Project $project, $image)
    {
        sleep(1); // give a delay in order to not overwrite the images
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path("images/projects/" . $filename);
        Image::make($image)->fit(543, 400)->save($location);

        $picture = new ProjectPicture();
        $picture->project_id = $project->id;
        $picture->location = $filename;
        $picture->save();
    }

    public function deletePictures(Project $project)
    {
        foreach ($project->images as $image) {
            File::delete(public_path("images/projects/" . $image->location));
        }
    }

    /*
    * Reformat the url for the Youtube Video Projects
    */
    public function formatUrl($url)
    {
        $string     = $url;
        $search     = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
        $replace    = 'http://www.youtube.com/embed/$2';
        $url        = preg_replace($search, $replace, $string);
        return $url;
    }
}
