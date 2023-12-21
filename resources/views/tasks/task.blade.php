@extends('layout/template')
@section('title-page', 'Detail task')
@section('container')
    <div class="row justify-content-center min-vh-100 d-flex align-items-center">
        <div class="card">
            <div class="card-header text-center">
                <h3>
                    <i class="fas fa-eye"></i> Detail task 
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h3>
                            {{ $task->tittle }} ( {{ $project->tittle }})
                            <span class="badge bg-{{ $status }}">{{ $task->expiration_date }}</span>
                        </h3>
    
                        <p>{{ $task->description }}</p>
                    </div>
                    <div class="col-3">
                        <h1>
                            <i class="fas fa-user-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $user->name }}"></i>
                        </h1>
                        <b>User: </b>{{ $user->name }} <br>
                        <b>Project: </b>{{ $project->tittle }} <br>
                        <b>Expiration date: </b>{{ $task->expiration_date }} <br>
                        <b>Status: </b>{{ $taskstatus->description }} <br>
                    </div>
                </div> <br><br>
                <div class="row">
                    <div class="col-9">
                        <hr>
                        <h4>Comments</h4> <br>

                        <div class="row">
                            <div class="col-sm-12">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @foreach ($taskcomments as $comment)
                            <div class="row" >
                                <div class="col-1" style="text-align: center;">
                                    <h4>
                                        <i class="fas fa-user-circle"></i>
                                    </h4>
                                </div>
                                <div class="col-11">
                                    <b> {{ $comment->name }} </b> 
                                    <i>{{ $comment->created_at }}</i> 
                                    <a href="{{ route('comments.destroy', $comment->id) }}" style="text-decoration: none; color: gray;">Delete</a>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-11">
                                    {{ $comment->comment }}
                                </div><br><br>  
                            </div>
                        @endforeach
                            
                        <form action="{{ route('comments.store', $task->id) }}" method="POST">
                            @csrf
                            <div class="row" style="text-align: center;">
                                <div class="col-1">
                                    <h4>
                                        <i class="fas fa-user-circle"></i>
                                    </h4>
                                </div>
                                <div class="col-9" style="">
                                    <input type="text" name="comment" class="form-control" placeholder="Add a comment..." required>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary">Comment <i class="fas fa-comment"></i></button>
                                </div>
                            </div>
                        </form><br>
                    </div>
                </div><br>

                <a href="{{ route('tasks.tasks', $task->project) }}" class="btn btn-danger">Regresar <i class="fas fa-undo"></i></a>
            </div>
        </div>
    </div>
@endsection
