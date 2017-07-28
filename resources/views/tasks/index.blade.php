@extends('layouts.master')

@section('title')
    <title>Task list</title>
@endsection

@section('content')
    <h4>{{ Auth::check() ? auth()->user()->name : 'You' }}, must shall:</h4>
    <ol>
        @forelse($tasks as $task)
            @if(isset($task->user) && $task->user->id === Auth::id())
            <li>
                <a href="/tasks/{{ $task->id }}">{{ htmlspecialchars($task->body) }}</a>
                <input title="Выполнено?" type="checkbox" {{ $task->completed ? 'checked="checked"' : ''}} /><br />(from {{ $task->created_at }})
            </li>
            @endif
        @empty

        @endforelse
    </ol>
    <p>Есть планы? Добавь их <a href="/tasks/create">сюда!</a></p>
@endsection