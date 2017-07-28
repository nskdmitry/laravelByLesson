@if($attached = count($tag->posts))
    <a href="/posts/tags/{{ $tag->name }}" style="font-size: {{ 10 + $attached*2 }}px;">{{ $tag->name }}</a>
@else
    {{ $tag->name }}
@endif