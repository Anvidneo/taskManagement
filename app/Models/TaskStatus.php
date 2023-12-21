<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskStatus extends Model
{
    
    use HasFactory;
    
    protected $table = 'task_status';

    public function allTaskStatus(){
        $taskstatus = TaskStatus::all();

        return $taskstatus;
    } 

    public function findStatus(int $id){
        $taskstatus = TaskStatus::find($id);

        return $taskstatus;
    } 

    public function task(): HasMany{
        return $this->hasMany(Tasks::class);
    }
}
