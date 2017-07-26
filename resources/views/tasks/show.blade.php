@extends('layouts.master')

@section('title')
    <title>Task #{{ $task->id }}</title>
@endsection

@section('content')
  <form id="taskEdit">
      <input type="hidden" id="id" value={{ $task->id }} />
      <div class="display">
          {{ intval($task->id) }} <input type="checkbox" title="Выполнено?" id="completed"
            @if ($task->completed)
              'checked="checked"'
            @else
              ''
            @endif
          />
      </div>
      <textarea id="body" class="display" rows="10" cols="40" title="Задача" placeholder="Задача" disabled>
          {{ htmlspecialchars($task->body) }}
      </textarea><br/>
      <input disabled="disabled" title="Время создания" placeholder="Здесь могло быть ваше время!" id="created_at" value="{{ $task->created_at }}" />
  </form>
@endsection