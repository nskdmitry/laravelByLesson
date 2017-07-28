<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
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
        $user = ($id = request('user')) ? User::find($id) : auth()->user();

        $user->todo(new Task(request(['body', 'completed'])));

        return redirect()->action('TasksController@index');
    }

    public function create() {
        return view('tasks.create');
    }
}
