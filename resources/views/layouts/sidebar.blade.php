<div class="sidebar-module sidebar-module-inset">
    @include('about')
</div>
<div class="sidebar-module">
   <h4>Archives</h4>
   <ol class="list-unstyled">
       @foreach(($archives = \App\Post::packPerMonth()) as $archive)
           <li>
               <a href="/posts?month={{ $archive['month'] }}&year={{ $archive['year'] }}">
                   {{ $archive['month'] }} {{ $archive['year'] }} ({{ $archive['published'] }})
               </a>
           </li>
       @endforeach
   </ol>
</div>
<div class="sidebar-module">
    <h4>Tags Cloud</h4>
    <ul class="list-unstyled">
        @foreach(( $tags = \App\Tag::all()) as $tag)
            <li>
                @if($attached = count($tag->posts))
                <a href="/posts/tags/{{ $tag->name }}" style="font-size: {{ 10 + $attached*4 }};">
                    {{ $tag->name }}
                </a> ({{ $attached }})
                @else
                    {{ $tag->name }}
                @endif
            </li>
        @endforeach
    </ul>
</div>
<div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
    </ol>
</div>