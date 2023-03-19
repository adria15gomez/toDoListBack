<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }


    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');

        $task->save();

        return response()->json($task);
    }


    public function show($id)
    {
        $task = Task::find($id);

        return response()->json($task);
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        return response()->json($task);
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json('Task removed successfully.');
    }
}
