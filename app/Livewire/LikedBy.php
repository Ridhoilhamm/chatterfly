<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\User;
use Livewire\Component;

class LikedBy extends Component
{
    public $userId;
    public $likers = [];
    public $user;

    public function mount($userId)
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
        $this->userId = $userId;
        $this->user = User::find($userId);
        $this->likers = Like::whereHas('post', function ($query) {
                $query->where('user_id', $this->userId);
            })
            ->with('user')
            ->get();
    }

    public function render()
    {
        return view('livewire.liked-by', [
            'likers' => $this->likers
        ])->extends('layouts.app')->section('content');
    }
}
