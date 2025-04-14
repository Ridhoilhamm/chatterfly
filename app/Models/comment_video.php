<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_video extends Model
{
    use HasFactory;

    protected $fillable = ['post_video_id', 'user_id', 'comment', 'parent_id'];

    public function post()
    {
        return $this->belongsTo(post_video::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(comment_video::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(comment_video::class, 'parent_id');
    }
}
