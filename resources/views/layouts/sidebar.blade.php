<div class="sidebar-module sidebar-module-inset">
    @include('about')
</div>
<div class="sidebar-module">
   <h4>Archives</h4>
   <ol class="list-unstyled">
       @foreach($archives as $archive)
           <li>
               <a href="/posts?month={{ $archive['month'] }}&year={{ $archive['year'] }}">
                   {{ $archive['month'] }} {{ $archive['year'] }} ({{ $archive['published'] }})
               </a>
           </li>
       @endforeach
   </ol>
</div>
<div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
    </ol>
</div>