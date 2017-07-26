@extends('layouts.master')

@section('title')
    <title>Task list</title>
@endsection

@section('content')
    <h4>{{ $name }}, must shall:</h4>
    <ol>
        @foreach ($tasks as $task)
            <li>
                <a href="/tasks/{{ $task->id }}">{{ htmlspecialchars($task->body) }}</a>
                <input title="Выполнено?" type="checkbox" {{ $task->completed ? 'checked="checked"' : ''}} /><br />(from {{ $task->created_at }})
            </li>
        @endforeach
    </ol>
@endsection