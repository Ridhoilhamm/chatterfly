<?php

namespace App\Livewire;

use App\Models\post_foto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Detailtagpostingan extends Component
{
    public $taggedPosts;
    public $userId;
    public $users = [];

    public function mount()
{
    session()->put('hideNavbar', true);
    session()->put('hideFooter', true);

    $this->userId = Auth::id();
    $this->taggedPosts = post_foto::whereHas('taggedFriends', function ($query) {
        $query->where('friend_id', $this->userId);
    })->with('user')->latest()->get();
}
    
    public function selectUser($userId)
    {
        return Redirect::route('detailpengguna', ['userId' => $userId]);
    }
    public function render()
    {
        return view('livewire.detailtagpostingan', [
            'taggedPosts' => $this->taggedPosts,
        ])->extends('layouts.app')->section('content');
    }
}
