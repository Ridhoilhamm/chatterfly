<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class highlights extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
