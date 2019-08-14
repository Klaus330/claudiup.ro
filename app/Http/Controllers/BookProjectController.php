<?php

namespace App\Http\Controllers;

use App\PdfFile;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookProjectController extends Controller
{
    public function __construct()
    {
        return 	$this->middleware("auth")->except(['show']);
    }

    public static function store(Request $request)
    {
        $project = new Project();

        $project->title = request('title');
        $project->client = request('client');
        $project->type = request('type');
        $project->description = request("description");
        $project->saveThumbnail($request, $project);
        $project->save();
        $project->skills()->sync(request('skills'), false);
        
        PdfFile::store($request, $project);
    }

    public static function update(Request $request, Project $project)
    {
        $project->update(request(['title','client','description','type']));

        if (request('thumbnail')) {
            $project->saveThumbnail($request, $project);
        }

        $project->save();

        PdfFile::updatePDF($request, $project);

        $project->skills()->sync(request('skills'), false);
    }
   
    public static function delete(Project $project)
    {
        PdfFile::elimitate("/files/uploads/{$project->pdf->location}");
        $project->eliminate();
    }

    public function show(Project $project)
    {
        return view("pages.showProject", compact("project"));
    }
}
