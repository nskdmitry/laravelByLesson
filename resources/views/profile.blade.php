@extends('layouts.master')

@section('title')
    <title>Profile of {{ $user->name }}</title>
@endsection

@section('content')
    <div>
        <form method="post" action="/user/profile">
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="">User name:</label>
                <input class="form-control" id="name" name="name" value="{{ $user->name }}" disabled />
            </div>
            <div class="form-group">
                <button type="submit">Ok</button>
            </div>
        </form>
    </div>
@endsection