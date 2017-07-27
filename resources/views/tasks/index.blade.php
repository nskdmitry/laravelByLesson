@extends('layouts.master')

@section('title')
    <title>Task list</title>
@endsection

@section('content')
    <h4>{{ Auth::check() ? auth()->user()->name : 'You' }}, must shall:</h4>
    <ol>
        @foreach ($tasks as $task)
            @if(isset($task->user) && $task->user->id === Auth::id())
            <li>
                <a href="/tasks/{{ $task->id }}">{{ htmlspecialchars($task->body) }}</a>
                <input title="Выполнено?" type="checkbox" {{ $task->completed ? 'checked="checked"' : ''}} /><br />(from {{ $task->created_at }})
            </li>
            @endif
        @endforeach
    </ol>
@endsection