<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroupMember extends Model
{
    use HasFactory;

    protected $fillable = ['group_id', 'user_id'];

    public function group()
    {
        return $this->belongsTo(ChatGroup::class);
    }
}
