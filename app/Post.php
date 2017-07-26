<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addComment(Request $request) {
        $this->comments()->create(['user_id' => intval($request['user']), 'body' => $request['body']]);
    }
}
