<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    static $name = 'Dmitry';

    public function index() {
        $tasks = Task::all();
        //)->with(varname, varvalue) //, [varname => varvalue]) //compact(varname))
        return view('tasks.index', ['name' => static::$name, 'completed' => false, 'tasks' => $tasks]);
    }

    public function show(Task $task) {
        return view('tasks.show')->with('task', $task);
    }
}
