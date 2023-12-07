@extends('layout/template')
@section('title-page', 'Edit task')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-plus"></i> Edit task 
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Tittle</label>
                    <input type="text" name="tittle" class="form-control" value="{{ $task->tittle }}" required>
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $task->description }}" required>
                    <label class="form-label">Expiration date</label>
                    <input type="date" name="expiration_date" class="form-control" value="{{ $task->expiration_date }}" required>
                    <label class="form-label">Status</label>
                    <select class="form-select form-select-sm" name="status" required>
                        <option>Select status</option>
                        @foreach ($taskstatus as $status)
                            <option value="{{ $status->id }}" {{ $task->status == $status->id ? 'selected' : ''}}>{{ $status->description }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">Assigned to</label>
                    <select class="form-select form-select-sm" name="assigned_to" required>
                        <option>Select user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $task->assigned_to == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <a href="{{ route('tasks.tasks', $task->project) }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Update <i class="fas fa-save"></i></button>
                </form><br>
            </div>
        </div>
    </div>
@endsection
