@extends('layout/template')
@section('title-page', 'Create task')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-plus"></i> Create task 
                </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <label class="form-label">Tittle</label>
                    <input type="text" name="tittle" class="form-control" required>
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required>
                    <label class="form-label">Expiration date</label>
                    <input type="date" name="expiration_date" class="form-control" required>
                    <label class="form-label">Status</label>
                    <select class="form-select form-select-sm" name="status" required>
                        <option value="" selected>Select status</option>
                        @foreach ($taskstatus as $status)
                            <option value="{{ $status->id }}">{{ $status->description }}</option>
                        @endforeach
                    </select>
                    <label class="form-label">Assigned to</label>
                    <select class="form-select form-select-sm" name="assigned_to" required>
                        <option value="" selected>Select user</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="project" value="{{ $project->id }}" class="form-control" hidden>
                    <br>
                    <a href="{{ route('tasks.tasks', $project->id) }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Save <i class="fas fa-save"></i></button>
                </form><br>
            </div>
        </div>
    </div>
@endsection
