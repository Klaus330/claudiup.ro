<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideProjectController extends Controller
{
    public function __construct()
    {
        return 	$this->middleware("auth");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $project = new Project();

        $project->title = request('title');
        $project->client = request('client');
        $project->type = request('type');
        $project->description = request("description");
        $project->saveThumbnail($request, $project);
        $project->save();

        foreach (request('slide') as $image) {
            $project->savePicture($project, $image);
        }

        $project->skills()->sync(request('skills'), false);
    }

    /**
    * Update an existing resource in storage.
    *
    * @return \Illuminate\Http\Response
    * @param App\Project $project
    */
    public static function update(Request $request, Project $project)
    {
        $project->title = request('title');
        $project->client = request('client');
        $project->type = request('type');
        $project->description = request("description");

        if (request('thumbnail')) {
            $project->saveThumbnail($request, $project);
        }

        $project->save();

        if (request('slide')) {
            $project->deletePictures($project);
            foreach (request('slide') as $image) {
                $project->savePicture($project, $image);
            }
        }


        $project->skills()->sync(request('skills'), false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public static function delete(Project $project)
    {
        $project->deletePictures($project);
        $project->skills()->detach(request('skills'));
        File::delete(public_path("images/thumbnail/projects/" . $project->thumbnail));
        $project->delete();
    }
}
