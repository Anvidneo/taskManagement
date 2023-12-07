@extends('layout/template')
@section('title-page', 'Edit project')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-plus"></i> Edit project 
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-label">Tittle</label>
                    <input type="text" name="tittle" class="form-control" value="{{ $project->tittle }}" required>
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $project->description }}" required>
                    <label class="form-label">Init date</label>
                    <input type="date" name="init_date" class="form-control" value="{{ $project->init_date }}" required>

                    <br>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Update <i class="fas fa-save"></i></button>
                </form><br>
            </div>
        </div>
    </div>
@endsection
