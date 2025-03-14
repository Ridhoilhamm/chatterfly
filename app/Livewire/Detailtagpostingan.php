<?php

namespace App\Livewire;

use App\Models\post_foto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detailtagpostingan extends Component
{
    public $taggedPosts;
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();
        $this->taggedPosts = post_foto::whereHas('taggedFriends', function ($query) {
            $query->where('friend_id', $this->userId);
        })->with('user')->latest()->get();
    }
    public function render()
    {
        return view('livewire.detailtagpostingan', [
            'taggedPosts' => $this->taggedPosts,
        ])->extends('layouts.app')->section('content');
    }
}
