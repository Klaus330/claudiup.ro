<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ImageProjectController;
use App\Http\Controllers\SlideProjectController;
use App\Http\Controllers\YoutubeProjectController;
use App\Project;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view("admin.projects.table", compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::pluck('name', 'id');
        return view("admin.projects.create", compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            "title" => "required|string",
            'client'=>"required|string",
            'type'=>'required|string',
            'description'=>'required|string',
            'thumbnail' =>  'image|sometimes',
        ]);
        
        switch (request('type')) {
            case 'image':
                ImageProjectController::store($request);
                break;
            case 'youtube':
                YoutubeProjectController::store($request);
                break;
            case 'slide':
                SlideProjectController::store($request);
                break;
            case 'book':
                BookProjectController::store($request);
                break;
        }
        return redirect('/projects');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $skills = Skill::pluck('name', 'id');
        return view("admin.projects.edit", compact('project', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            "title" => "required|string",
            'client'=>"required|string",
            'type'=>'required|string',
            'description'=>'required|string',
            'thumbnail' =>  'image|sometimes',
        ]);
        
        $project = Project::find($id);
        switch (request('type')) {
            case 'image':
                ImageProjectController::update($request, $project);
                break;
            case 'youtube':
                YoutubeProjectController::update($request, $project);
                break;
            case 'slide':
                SlideProjectController::update($request, $project);
                break;
            case 'book':
                BookProjectController::update($request, $project);
                break;
        }
        return redirect()->route("projects.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        
        switch ($project->type) {
            case 'image':
                ImageProjectController::delete($project);
                break;
            case 'youtube':
                YoutubeProjectController::delete($project);
                break;
            case 'slide':
                SlideProjectController::delete($project);
                break;
            case 'book':
                BookProjectController::delete($project);
                break;
        }

        return back();
    }
}
