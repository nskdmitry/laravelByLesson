@extends('layouts.master')

@section('title')
    <title>Posts. Add post</title>
@endsection

@section('content')
    <div>
        <form id="post" action="/posts" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="user">Представьтесь: </label>
                @include('layouts.user')
            </div>
            <div class="form-group">
                <label for="title">Тема: </label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Добавьте заголовок" size="35">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="body" name="body" rows="5" cols="40" placeholder="Чем собираетесь поделиться?"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Опубликовать</button>
                <a href="/posts/">Отмена</a>
            </div>
            @include('layouts.errors')
        </form>
    </div>
@endsection