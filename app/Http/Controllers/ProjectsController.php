<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();
        // return $projects;
        return view('project.index' , compact('projects'));
    }

    public function create(){
        return view('project.create');
    }
    public function store(Request $request){
        //old not good way
        // $project = new Project;
        // $project->title = $request->title;
        // $project->description = $request->description;
        // $project->save();
        //old not good way
        $valideated =  request()->validate([
            'title' => 'required|min:3|max:5',
            'description' => 'required|min:3'
        ]);
        Project::create($valideated);
        return redirect('/projects');
    }
    public function show(Project $project){
        return view('project.show', compact('project'));
    }
    public function edit(Project $project){
        return view('project.edit ', compact('project'));
    }
    public function update(Project $project){
        $project->update(request()->all());
        return redirect('/projects');
    }
    public function destroy(Project $project){

        $project->delete();
        return redirect('/projects');
    }
}
