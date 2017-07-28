@extends('layouts.master')

@section('title')
    <title>Task #{{ $post->id }}</title>
@endsection

@section('content')
    <form id="taskEdit">
        <input type="hidden" id="id" name="id" value={{ $post->id }} />
        <input type="hidden" id="user" name="user" value="{{ auth()->user()->getAuthIdentifier() }}" />
        <p class="blog-header">
            <input type="text" id="title" name="title" value="{{ $post->title }}" placeholder="У данного поста нет темы" size="40" required disabled />
            <br />(by <a href="/users/{{ $post->user->id }}">{{ $post->user->name }}</a>)
        </p>
        <textarea id="body"
                  class="display"
                  rows="10"
                  cols="40"
                  title="Сообщение"
                  placeholder="Данное сообщение не прошло модерацию. За разъяснениями обратитесь к администратору"
                  disabled>
          {{ htmlspecialchars($post->body) }}
      </textarea><br/>
      <input disabled title="Время создания" placeholder="Здесь могло быть ваше время!" value="{{ $post->created_at }}" />
      @if(strcmp($post->created_at, $post->updated_at) !== 0)
          <input disabled title="Последние правки были" placeholder="Видать, не менялось" value="{{ $post->updated_at }}" />
      @endif
      @if(count($tags = $post->tags->all()))
          <div class="form-group">
               @foreach($tags as $tag)
                   #@include('layouts.tag')
               @endforeach
          </div>
      @endif
    </form>
    <hr>
    <div class="comment">
        @foreach($post->comments as $comment)
            @if(isset($comment->user))
            <article class="list-group-item">
                <h4>(<time>{{ $comment->created_at->diffForHumans() }}</time>) <a href="/users/{{ $comment->user_id }}">{{ $comment->user->name }} say:</a></h4>
                {{ strip_tags($comment->body, '<p><ol><li><table><tr><td><th><div><h1><h2><h3><h4><h5><code><quote><cite>') }}
            </article>
            @endif
        @endforeach
        <div class="list-group-item">
            <form action="/posts/{{ $post->id }}/comments" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="user">Представьтесь: </label>
                    @include('layouts.user')
                </div>
                <div class="form-group">
                    <textarea id="body" name="body" rows="10" cols="40"
                              title="Комментарий" placeholder="Ваше мнение?">
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Пусть знают!</button>
                    <a href="/posts">Назад</a><br/>
                </div>

                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection