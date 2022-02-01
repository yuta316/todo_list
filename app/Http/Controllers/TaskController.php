<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::with('user')->get();
        return $tasks;
    }
    public function show(Task $task){
        return $task;
    }
    public function store(Request $request){
        return Task::create($request->all());
    }
    public function update(Request $request, Task $task){
        $task->update($request->all());
    }
    public function destroy(Task $task){
        $task->delete();

        return $task;
    }
}
