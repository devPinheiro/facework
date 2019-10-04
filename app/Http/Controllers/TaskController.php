<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Profile;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
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
    public function store(Request $request)
    {
        //
        $this->validate($request, [
           'client_name' => 'required',
           'description' => 'required',
           'location' => 'required',
            'date' => 'required',
             'phone' => 'required'
        ]);

        $task = Task::create([
          'client_name' => $request->client_name,
           'user_id' => $request->user_id,          
          'title' => $request->title,
          'description' => $request->description,
          'phone' => $request->phone,
          'location' => $request->location,
          'date' => $request->date
        ]);

        return redirect()->back()->with('flash_message', 'Task,
             '. $task->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
        $tasks = User::find($id)->task;
        return view('tasks.show',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
