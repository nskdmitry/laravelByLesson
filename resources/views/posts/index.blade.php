@extends('layouts.master')

@section('title')
    <title>Posts</title>
@endsection

@section('content')
    @if(isset($all))
        @forelse($all as $post)
            @include('layouts.post')
        @empty
            <div>
                <p>Первым будешь?</p>
            </div>
        @endforelse
    @else
        <div class="blog-post alert">
            Error: the variable $all is not set before view generation.
        </div>
    @endif
    <div>
        <a href="/posts/create">Добавить новую запись</a>
    </div>
@endsection
