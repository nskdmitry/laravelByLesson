<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['completed', 'body', 'user_id'];

    public static function incomplete() {
        return static::where('completed', '=', 0)->get();
    }

    public function scopeIncomplete($query) {
        return $query->where('completed', '=', 0);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
