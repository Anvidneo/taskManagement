@extends('layout/template')

@section('title-page', 'Projects')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3><i class="fas fa-project-diagram"></i> List of tasks of project ({{ $project->tittle }})</h3>
            </div>
            <div class="card-body ">
                <div>
                    <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Create</a>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="table-responsive text-center">
                    <table class="table table-sm table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tittle</th>
                                <th>Description</th>
                                <th>Expiration Date</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->tittle }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->expiration_date }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->task_statuses }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">
                                            Edit <i class="fas fa-user-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">
                                            Delete <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div><br><br>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">Regresar <i class="fas fa-undo"></i></a>
                    
                <div style="float: right;">
                    <a href="{{ route('signout') }}">Signout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
