<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_video extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'video_path', 'caption'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(comment_video::class, 'post_video_id');
    }
}
