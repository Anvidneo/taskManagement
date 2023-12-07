@extends('layout/template')
@section('title-page', 'Delete task')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-trash"></i> Delete task 
                </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('tasks.destroy', $task->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="alert alert-danger">
                        Are you sure do you want delete ({{ $task->tittle }}) task?
                    </div>
                    <a href="{{ route('tasks.tasks', $task->project) }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Delete <i class="fas fa-save"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
