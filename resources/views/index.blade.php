@extends('layout/template')

@section('title-page', 'Projects')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3><i class="fas fa-project-diagram"></i> List of projects in the system</h3>
            </div>
            <div class="card-body ">
                <div>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> Create</a>
                </div><br>
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
                                <th>Creator</th>
                                <th>Init Date</th>
                                <th>Tasks</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->tittle }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->init_date }}</td>
                                    <td>
                                        <a href="{{ route('tasks.tasks', $project->id) }}" class="btn btn-info">
                                            Tasks <i class="fas fa-user-add"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                                            Edit <i class="fas fa-user-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('projects.delete', $project->id) }}" class="btn btn-danger">
                                            Delete <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-12">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div><br>
                <div style="float: right;">
                    <a href="{{ route('signout') }}">Signout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
