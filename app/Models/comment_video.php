<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_video extends Model
{
    use HasFactory;

    protected $fillable = ['post_video_id', 'user_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(post_video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
