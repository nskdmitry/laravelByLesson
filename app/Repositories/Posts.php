<?php

namespace App\Repositories;

use App\Post;
use App\Redis;

class Posts
{
    protected $redis;
    protected $allBulk;
    protected $count;

    public function __construct(Redis $redis) {
        $this->redis = $redis;
        $this->allBulk = false;
        $this->count = 0;
    }

    public function all() {
        if (!$this->allBulk) {
            $posts = Post::all()->get();
            $this->count = $posts->count();
            foreach ($posts as $post) {
                $this->redis->append('post_'.$post->id, $post);
            }
            $this->allBulk = true;
        } else {
            $keys = array_map(function($post) { return 'post_'.$post->id; }, range(1, $this->count));
            $posts = $this->redis->getMultiple($keys);
        }

        return $posts;
    }

    public function find($id) {
        $key = 'post_' . $id;
        if (!$this->redis->exists($key)){
            $post = Post::find($id);
            $this->redis->append($key, $post);
        } else {
            $post = $this->redis->get($key);
        }

        return $post;
    }
}