<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shared_post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(post_foto::class, 'post_foto_id');
    }
    // Di model SharedPost


    public function sender()
    {
        return $this->belongsTo(\App\Models\User::class, 'sender_id');
    }
}
