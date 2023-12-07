<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Tasks;
use App\Models\TaskStatuses;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $users;
    protected $projects;
    protected $tasks;
    protected $taskstatus;
    public function __construct(){
        $this->users = new User();
        $this->projects = new Projects();
        $this->tasks = new Tasks();
        $this->taskstatus = new TaskStatuses();
    }

    public function tasks(int $id){
        $tasks = $this->tasks->findTasksByProject($id);
        $project = $this->projects->findProject($id);
        return view('tasks.tasks', ['tasks' => $tasks, 'project' => $project]);
    }

    public function create(int $id){
        $users = $this->users->allUsers();
        $project = $this->projects->findProject($id);
        $taskstatus = $this->taskstatus->allTaskStatuses();
        return view('tasks.create', ['users' => $users, 'project' => $project, 'taskstatus' => $taskstatus]);
    }

    public function store(Request $request){   
        $task = new Tasks();
        $task->tittle = $request->post('tittle');
        $task->description = $request->post('description');
        $task->expiration_date = $request->post('expiration_date');
        $task->status = $request->post('status');
        $task->assigned_to = $request->post('assigned_to');
        $task->project = $request->post('project');
        $this->tasks->newTask($task); 

        return redirect()->route('tasks.tasks', $task->project)->with('success', 'Task created successfully');
    }

    public function edit(int $id){
        $task = Tasks::find($id);
        $users = $this->users->allUsers();
        $project = $this->projects->findProject($task->project);
        $taskstatus = $this->taskstatus->allTaskStatuses();
        return view('tasks.edit', ['users' => $users, 'task' => $task, 'project' => $project, 'taskstatus' => $taskstatus]);
    }

    public function update(Request $request, int $id){
        $task = Tasks::find($id);
        $task->tittle = $request->post('tittle');
        $task->description = $request->post('description');
        $task->expiration_date = $request->post('expiration_date');
        $task->status = $request->post('status');
        $task->assigned_to = $request->post('assigned_to');
        $this->tasks->updateTask($task); 

        return redirect()->route('tasks.tasks', $task->project)->with('success', 'Task updated successfully');
    }

    public function delete($id){
        $task = Tasks::find($id);
        return view('tasks.delete', compact('task'));
    }

    public function destroy($id){
        $task = Tasks::find($id);
        $this->tasks->deleteTask($id);

        return redirect()->route('tasks.tasks', $task->project)->with('success', 'Task deleted successfully');
    }
}
