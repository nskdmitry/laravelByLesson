@extends('layouts.master')

@section('title')
    <title>Task #{{ $task->id }}</title>
@endsection

<?php
  $edit = isset($edit) && $edit;
?>

@section('content')
  <form id="taskEdit" method="post" action="/tasks/{{ $task->id }}">
      {{ method_field('patch') }}

      <div class="form-group">
          <input type="text" class="form-control" id="user" value="{{ $task->user->name }}" disabled>
      </div>
      <div class="form-group">
          <textarea id="body" name="body" class="form-control" rows="10" cols="40" title="Задача" placeholder="Задача" {{ !$edit ? 'disabled' : '' }}>
            {{ htmlspecialchars($task->body) }}
          </textarea>
      </div>
      <div class="form-group">
          <label for="completed">Выполнено?</label>
          <input type="checkbox" class="form-control" title="Выполнено?" id="completed" name="completed" {{ $task->completed ? 'checked="checked"' : ''}} {{ !$edit ? 'disabled' : '' }} />
      </div>
      <div class="form-group">
          <input disabled title="Время создания" placeholder="Здесь могло быть ваше время!" id="created_at" value="{{ $edit ? date('Y-m-d H:i:s') : $task->created_at }}" />
      </div>
      <div class="form-group">
          @if($edit)
              <button type="submit">Сохранить изменения</button> <a href="/tasks/{{ $task->id }}">Отмена</a>
          @elseif($task->user->id === auth()->id())
              <a href="/tasks/{{ $task->id }}/edit">Редактировать</a>
          @endif
      </div>
  </form>
@endsection