<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Tasks extends Model
{
    use HasFactory;

    public function findTasksByProject($id){
        $tasks = DB::table('tasks')
            ->join('projects', 'tasks.project', '=', 'projects.id')
            ->join('users', 'tasks.assigned_to', '=', 'users.id')
            ->join('task_status', 'tasks.status', '=', 'task_status.id')
            ->select('tasks.*', 'users.name', DB::raw('task_status.description as task_status'))
            ->where('project', '=', $id)
            ->orderBy('expiration_date', 'asc')
            ->paginate(10);

        return $tasks;
    } 

    public function findTasksById($id){
        $task = Tasks::find($id);

        return $task;
    } 

    public function newTask(Tasks $task){
        $task->save();
    } 

    public function updateTask(Tasks $task){
        $task->save();
    }

    public function deleteTask(int $id){
        $task = Tasks::find($id);
        $task->delete();
    }
    
    public function project(): BelongsTo{
        return $this->belongsTo(Projects::class);
    }

    public function taskstatus(): BelongsTo{
        return $this->belongsTo(TaskStatus::class);
    }
}
