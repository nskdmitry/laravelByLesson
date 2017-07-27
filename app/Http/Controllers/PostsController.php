<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $posts = Post::all();
        /*
        $sql = 'id > 0';
        if ($month = \request('month')) {
            $sql .= " AND monthname(created_at) LIKE '$month'";
        }
        if ($year = \request('year')) {
            $sql .= " AND year(created_at) LIKE '$year'";
        }
        $posts = mb_strlen($sql) > 0 ? $posts->whereRaw($sql) : $posts;
*/
        return view('posts.index')->with('all', $posts);
    }

    public function create() {
        return view('posts.add', ['users' => User::all()]);
    }

    public function store() {
        $this->validate(request(), [
            'title' => 'required|min:1|max:255',
            'body' => 'required|min:10'
        ]);

        auth()->user()->publish(new Post(\request(['title', 'body'])));

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
