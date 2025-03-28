<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_foto_id', 'user_id', 'comment'];

    public function post()
    {
        return $this->belongsTo(post_foto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
