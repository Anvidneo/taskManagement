<?php

namespace App\Http\Controllers;

use App\Models\TaskComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCommentsController extends Controller
{
    protected $taskcomments;
    public function __construct(){
        $this->taskcomments = new TaskComments();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $creator = Auth::id();
        $comment = new TaskComments();
        $comment->comment = $request->post('comment');
        $comment->task = $id;
        $comment->creator = $creator;
        $this->taskcomments->newComment($comment); 

        return redirect()->route('tasks.task', $id)->with('success', 'Commented successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskComments  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function show(TaskComments $taskComments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskComments  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskComments $taskComments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskComments  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskComments $taskComments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskComments  $taskComments
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) {
        $comment = $this->taskcomments->findTasksById($id);
        $this->taskcomments->deleteComment($id);

        return redirect()->route('tasks.task', $comment->task)->with('success', 'Comment deleted');
    }
}
