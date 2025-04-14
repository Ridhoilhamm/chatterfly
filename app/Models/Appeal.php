<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function report()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(post_foto::class, 'post_id');
    }
}
