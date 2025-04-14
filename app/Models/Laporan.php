<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use  HasFactory;
    protected $guarded = [];

    // Report.php
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(post_foto::class, 'post_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class, 'post_id');
    }

    public function appeal()
    {
        return $this->hasOne(Appeal::class);
    }
}
