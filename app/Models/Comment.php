<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_foto_id', 'user_id', 'comment', 'parent_id'];

    public function post()
    {
        return $this->belongsTo(post_foto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postVideo()
    {
        return $this->belongsTo(post_video::class, 'post_video_id');
    }


    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
