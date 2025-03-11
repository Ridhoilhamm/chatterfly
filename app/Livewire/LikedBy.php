<?php

namespace App\Livewire;

use App\Models\like;
use App\Models\User;
use Livewire\Component;

class LikedBy extends Component
{

    public $userId;
    public $likers = [];
    public $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);

        $this->likers = Like::where('user_id', $userId)
            ->with('user')
            ->get();
    }

    public function render()
    {
        return view('livewire.liked-by')
        ->extends('layouts.app')->section('content');
    }
}
