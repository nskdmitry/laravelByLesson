<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index')->with('all', Post::all());
    }

    public function create() {
        return view('posts.add', ['users' => User::all()]);
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required|min:1|max:255',
            'body' => 'required|min:10'
        ]);

        Post::create([
            'title' => request('title'),
            'user_id' => intval(request('user')) ?: 1,
            'body' => request('body')
        ]);

        return redirect()->action('PostsController@index');
    }

    public function show(Post $post) {
        return view('posts.show', ['post' => $post, 'users' => User::all()]);
    }

    public function comment(Post $post) {
        $this->validate(\request(), [
            'body' => 'required|min:2',
            'user' => 'required',
        ]);
        $post->addComment(\request());
        return back();
    }
}
