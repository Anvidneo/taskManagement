@extends('layout/template')
@section('title-page', 'Delete project')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-trash"></i> Delete project 
                </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('projects.destroy', $project->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="alert alert-danger">
                        Are you sure do you want delete ({{ $project->tittle }}) project?
                    </div>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Delete <i class="fas fa-save"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
