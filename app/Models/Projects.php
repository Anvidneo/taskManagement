<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Projects extends Model
{
    use HasFactory;

    public function allProjects(){
        $projects = DB::table('projects')
            ->join('users', 'users.id', '=', 'projects.creator')
            ->select('projects.*', 'users.name')
            ->orderBy('tittle', 'asc')
            ->paginate(10);

        return $projects;
    } 

    public function findProject($id){
        $project = Projects::find($id);

        return $project;
    } 

    public function newProject(Projects $project){
        $id = Auth::id();
        $project->creator = $id;
        $project->save();
    } 

    public function updateProject(Projects $project){
        $project->save();
    }

    public function deleteProject(int $id){
        $project = Projects::find($id);
        $project->delete();
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function task(): HasMany{
        return $this->hasMany(Tasks::class);
    }
}

