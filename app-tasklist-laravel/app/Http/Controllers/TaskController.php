<?php

namespace App\Http\Controllers;

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
        $tasks=\App\Task::all();
        return view('index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= new \App\Task;
        $task->title=$request->get('title');
        $task->description=$request->get('description');
        $task->finished=$request->get('finished');
        $task->save();
        
        return redirect('tasks')->with('success', 'Task included successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = \App\Task::find($id);
        return view('show', compact('task','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = \App\Task::find($id);
        return view('edit', compact('task','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = \App\Task::find($id);
        $task->title=$request->get('title');
        $task->description=$request->get('description');
        $task->finished=$request->get('finished');
        $task->save();        
        return redirect('tasks')->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        $task->delete();
        return redirect('tasks')->with('success','Task deleted successfully!');
    }
}
