<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_foto_tag extends Model
{
    use HasFactory;

    protected $table = 'post_foto_tags'; // Nama tabel pivot

    protected $fillable = ['post_foto_id', 'friend_id'];

    public $timestamps = false;

    public function postFoto()
    {
        return $this->belongsTo(post_foto::class, 'post_foto_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
    public function post()
    {
        return $this->belongsTo(post_foto::class, 'post_foto_id');
    }
  
}
