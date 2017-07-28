<div class="blog-post">
    <h2 class="blog-post-title">
        #{{ $post->id }}. <a href="/posts/{{ $post->id }}">{{ htmlspecialchars($post->title) }}</a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="/users/{{ $post->user_id }}">{{ $post->user->name }}</a></p>
    {{ strip_tags($post->body, '<p><ol><li><table><tr><td><th><div><h1><h2><h3><h4><h5><code><quote><cite>') }}
</div>