<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class PdfFile extends Model
{
	protected $fillable = ['project_id','location'];
    
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public static function store(Request $request, Project $project)
    {        
    	$extension = request()->file('pdf')->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $location = base_path().'/public/files/uploads/' . $filename;
        Input::file('pdf')->move(
          base_path().'/public/files/uploads/', $filename
        );

        $pdf = PdfFile::create([
            'project_id' => $project->id,
            'location' => $filename
       ]);
        $pdf->save();

        $project->pdf_file_id = $pdf->id;

        $project->save();
        return $pdf;
    }

    public static function updatePDF(Request $request,Project $project)
    {
        //delete the old pdf file 
        File::delete(public_path('/files/uploads/' . $project->pdf->location));
        
        //Save the new pdf file
       $pdf = PdfFile::store($request, $project);
    }
}
