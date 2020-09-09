<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        return view('projects.index', ['projects' => Project::orderBy('title')->get()]);
    }
    public function create() {
        return view('projects.create');
    }
    public function store(Request $request) {
        $project = new Project();
        // ERROR VALIDACIJA
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

               'title' => 'required|unique:prjocts,title',
               
           ]);
     // can be used for seeing the insides of the incoming request
        //  var_dump($request->all()); die();
        $project->fill($request->all());
        $project->save();
        return redirect()->route('projects.index');
    }
    public function edit(Project $project){
        return view('projects.edit', ['project' => $project]);
    }
 
    public function update(Request $request, Project $project){
        $project->fill($request->all());
        $project->save();
        return redirect()->route('projects.index');
    }
 
     public function destroy(Project $project){
        if (count($project->workers)){ 
            return back()->withErrors(['error' => ['You cannot delete the project if a worker is assigned!!!!']]);
        }
         $project->delete();
         return redirect()->route('projects.index');
     }
}