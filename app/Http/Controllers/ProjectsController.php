<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{   
    protected $users;
    protected $projects;
    public function __construct(){
        $this->users = new User();
        $this->projects = new Projects();
    }

    public function index(){
        $projects = $this->projects->allProjects();
        return view('index', compact('projects'));
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Request $request){   
        $project = new Projects();
        $project->tittle = $request->post('tittle');
        $project->description = $request->post('description');
        $project->init_date = $request->post('init_date');
        $this->projects->newProject($project); 

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function edit(int $id){
        $project = $this->projects->findProject($id);  
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, int $id){
        $project = $this->projects->findProject($id);        
        $project->tittle = $request->post('tittle');
        $project->description = $request->post('description');
        $project->init_date = $request->post('init_date');
        $this->projects->updateProject($project); 

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function delete($id){
        $project = $this->projects->findProject($id);  
        return view('projects.delete', compact('project'));
    }

    public function destroy($id){
        $this->projects->deleteProject($id);

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
