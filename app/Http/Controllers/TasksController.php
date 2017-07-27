<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', ['completed' => false, 'tasks' => $tasks]);
    }

    public function show(Task $task) {
        return view('tasks.show')->with('task', $task)->with('edit', false);
    }

    public function edit(Task $task) {
        return view('tasks.show')->with('task', $task)->with('edit', $task->user->id === auth()->id());
    }

    public function update(Task $task) {
        $task->body = request('body');
        $task->completed = \request('completed');
        $task->save();
    }

    public function store() {
        $request = request('body', 'completed');
        auth()->user()->todo(
            new Task([
                'user_id' => auth()->id(),
                'body' => $request['body'],
                'completed' => $request['completed']
            ])
        );
    }

    public function create() {
        return view('tasks.create');
    }
}
