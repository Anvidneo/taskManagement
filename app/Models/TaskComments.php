<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class TaskComments extends Model
{
    use HasFactory;
    protected $table = 'task_comments';

    public function findTasksById($id){
        $task = TaskComments::find($id);

        return $task;
    } 
    
    public function allCommentsByTask(int $id){
        $comments = DB::table('task_comments')
            ->join('users', 'task_comments.creator', '=', 'users.id')
            ->select('task_comments.*', 'users.name')
            ->where('task_comments.task', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return $comments;
    } 
    
    public function newComment(TaskComments $comments){
        $comments->save();
    } 

    public function deleteComment(int $id){
        $comment = TaskComments::find($id);
        $comment->delete();
    }

    public function task(): BelongsTo{
        return $this->belongsTo(Tasks::class);
    }
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
