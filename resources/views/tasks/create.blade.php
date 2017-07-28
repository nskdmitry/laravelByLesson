@extends('layouts.master')

@section('title')
    <title>New task</title>
@endsection

@section('content')
    <form id="taskEdit" method="post" action="/tasks/">
        {{ csrf_field() }}

        <input id="completed" name="completed" type="hidden" value="0">
        <div class="form-group">
            @if(auth()->check())
                <input type="text" class="form-control" id="user_name" value="{{ auth()->user()->name }}" disabled>
                <input type="hidden" id="user" name="user" value="{{ auth()->id() }}">
            @else
                @include('layouts.user')
            @endif
        </div>
        <div class="form-group">
          <textarea id="body" name="body" class="form-control" rows="10" cols="40" title="Задача" placeholder="Задача"></textarea>
        </div>
        <div class="form-group">
            <input disabled title="Время создания" placeholder="Здесь могло быть ваше время!" id="created_at" value="{{ date('Y-m-d H:i:s') }}" />
        </div>
        <div class="form-group">
            <button type="submit" class="form-control">Добавить</button> <a href="/tasks">Вернуться</a>
        </div>
    </form>
@endsection