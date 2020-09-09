<?php

namespace App\Http\Controllers;

use App\Project;
use App\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(Request $request){
        // var_dump($request->all()); die();
        //also code for filtering
        if (isset($request->project_id) && $request->project_id !== 0){
            $workers = Worker::where('project_id', $request->project_id)->orderBy('name')->get(); 
        } else {
            $projects = \App\Project::orderBy('title')->get();
            $workers = Worker::orderBy('name')->get();
        }
        return view('workers.index', ['workers' => $workers, 'projects' => \App\Project::orderBy('title')->get()]);

    }

    // ATTENTION :: we need projects to be able to assign them
    public function create(){
        $projects = \App\Project::orderBy('title')->get();
        return view('workers.create', ['projects' => $projects]);
        
        
    }
    public function store(Request $request){
        $worker = new Worker();
        // can be used for seeing the insides of the incoming request
        
        //ERROR VALIDACIJA
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

               'name' => 'required|unique:workers,name',
               'project_id' => 'required',
           ]);
   
        // var_dump($request->all()); die();
        $worker->fill($request->all());
        $worker->save();
        return redirect()->route('workers.index');
    }
    public function show(Worker $worker){
        //
    }
    // ATTENTION :: we need projects to be able to assign them
    public function edit(Worker $worker){
        $projects = \App\Project::orderBy('title')->get();
        return view('workers.edit', ['worker' => $worker, 'projects' => $projects]);
    }
    public function update(Request $request, Worker $worker){
        $worker->fill($request->all());
        $worker->save();
        return redirect()->route('workers.index');
    }
    public function destroy(Worker $worker){
        $worker->delete();
        return redirect()->route('workers.index');
    }
}