<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

//    public function __construct($attributes)
//    {
//        parent::__construct($attributes);
//        if ($tag = \App\Tag::all()->where('name', 'LIKE', '\*')) {
//            $this->tags()->attach($tag->id);
//        }
//    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function addComment(Request $request) {
        $this->comments()->create(['user_id' => intval($request['user']), 'body' => $request['body']]);
    }

    public static function packPerMonth() {
        return static::selectRaw(static::$queryMonth)
            ->groupBy(['year', 'month'])
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function scopeFilterByMonth($query) {
        if ($month = request('month')) {
            $query->whereRaw('monthname(created_at) LIKE \''.$month.'\'');
        }

        if ($year = request('year')) {
            $query->whereRaw('year(created_at) = '.$year);
        }
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    protected static $queryMonth = 'year(created_at) as year, monthname(created_at) as month, count(*) as published';
}
