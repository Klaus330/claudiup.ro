<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
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
    public function table()
    {
        $skills = Skill::latest()->paginate(10);
        return view("admin.skills.table",compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            "name" => "required|string|unique:skills,name",
            'experience_level'=>"required|integer|between:1,5"
        ]);

        Skill::create(request(['name','experience_level']));

        return redirect()->route("skills.table");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $id)
    {
        $skill = $id;
        $skills = Skill::latest()->paginate(10);
        return view("admin.skills.edit",compact('skill','skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Skill $id)
    {
         $this->validate(request(),[
            "name" => "required|string",
            'experience_level' => "required|integer|between:1,5"
        ]);

        $id->update(request(['name','experience_level']));

        return redirect()->route("skills.table");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skill::find($id)->delete();
        return back();
    }
}
