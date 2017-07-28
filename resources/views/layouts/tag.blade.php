@if($attached = count($tag->posts))
    <a href="/posts/tags/{{ $tag->name }}" style="font-size: {{ 10 + $attached*4 }};">{{ $tag->name }}</a>
@else
    {{ $tag->name }}
@endif