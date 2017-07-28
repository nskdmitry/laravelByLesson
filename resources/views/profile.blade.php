@extends('layouts.master')

@section('title')
    <title>Profile of {{ $user->name }}</title>
@endsection

@section('content')
    <div>
        <form method="post" action="/users/profile">
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="name">User name:</label>
                <input class="form-control" id="name" name="name" value="{{ $user->name }}" disabled />
            </div>
            <div class="form-group">
                <label for="email">User e-mail:</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-group">
                <button type="submit" disabled>Ok</button>
                <a href="/posts">Вернуться к постам</a>
            </div>
        </form>
    </div>
@endsection