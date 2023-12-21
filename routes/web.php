<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\TaskCommentsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 

Route::get('/registration', [CustomAuthController::class, 'registration'])->name('register.user');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::middleware('auth')->group(function(){    
    // Projects
    Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');

    Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectsController::class, 'store'])->name('projects.store');
    
    Route::get('/projects/edit/{id}', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    
    Route::get('/projects/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
    Route::delete('/projects/destroy/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    
    // Tasks
    Route::get('/tasks/{id}', [TasksController::class, 'tasks'])->name('tasks.tasks');
    Route::get('/tasks/task/{id}', [TasksController::class, 'task'])->name('tasks.task');
    Route::get('/tasks/create/{id}', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TasksController::class, 'store'])->name('tasks.store');
    
    Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/update/{id}', [TasksController::class, 'update'])->name('tasks.update');
    
    Route::get('/tasks/delete/{id}', [TasksController::class, 'delete'])->name('tasks.delete');
    Route::delete('/tasks/destroy/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

    // Comments
    Route::post('/comments/store/{id}', [TaskCommentsController::class, 'store'])->name('comments.store');
    Route::get('/comments/destroy/{id}', [TaskCommentsController::class, 'destroy'])->name('comments.destroy');
});
