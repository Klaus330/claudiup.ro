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
        return 	$this->middleware("auth");
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
        $pdf = PdfFile::store($request, $project);
        
        return redirect()->route("projects.table");
    }

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

        PdfFile::updatePDF($request, $project);

        $project->skills()->sync(request('skills'), false);
    }
   
    public static function delete(Project $project)
    {
        $project->skills()->detach(request('skills'));
        File::delete(public_path("/images/thumbnail/projects/" . $project->thumbnail));
        File::delete(public_path('/files/uploads/' . $project->pdf->location));
        $project->delete();
    }
}
