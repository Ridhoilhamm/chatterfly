<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_foto extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image_path', 'caption'];



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_foto_id');
    }

    public function taggedFriends()
    {
        return $this->belongsToMany(User::class, 'post_foto_tags', 'post_foto_id', 'friend_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); 
    }
    public function sharedPosts()
    {
        return $this->hasMany(shared_post::class, 'post_id');
    }
}
