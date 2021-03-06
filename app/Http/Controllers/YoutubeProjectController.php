<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class YoutubeProjectController extends Controller
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
        $project->url = request('url');
        $project->saveThumbnail($request, $project);
        $project->save();

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
        $project->update(request(['title','client','type','description']));
        
        $project->url = request('url');
        
        if (request('thumbnail')) 
            $project->updateThumbnail($request, $project);

        $project->skills()->sync(request('skills'), false);
        $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public static function delete(Project $project)
    {
        $project->eliminate();
    }
}
