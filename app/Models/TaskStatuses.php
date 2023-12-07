<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskStatuses extends Model
{
    use HasFactory;

    public function allTaskStatuses(){
        $taskstatus = TaskStatuses::all();

        return $taskstatus;
    } 

    public function task(): HasMany{
        return $this->hasMany(Tasks::class);
    }
}
