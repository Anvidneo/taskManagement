@extends('layout/template')
@section('title-page', 'Create project')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-plus"></i> Create project 
                </h3>
            </div>
            <div class="card-body ">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <label class="form-label">Tittle</label>
                    <input type="text" name="tittle" class="form-control" required>
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required>
                    <label class="form-label">Init date</label>
                    <input type="date" name="init_date" class="form-control" required>
                    <br>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel <i class="fas fa-ban"></i></a>
                    <button class="btn btn-primary">Save <i class="fas fa-save"></i></button>
                </form><br>
            </div>
        </div>
    </div>
@endsection
