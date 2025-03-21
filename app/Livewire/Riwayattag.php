<?php

namespace App\Livewire;

use App\Models\post_foto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Riwayattag extends Component
{
    public $taggedPosts;
    public $taggedCount;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
        $this->getTaggedPosts();
    }

    public function getTaggedPosts()
    {
        $this->taggedPosts = post_foto::whereHas('taggedFriends', function ($query) {
                $query->where('friend_id', Auth::id());
            })
            ->with(['user', 'taggedFriends'])
            ->latest()
            ->get();

        $this->countTaggedPosts();
    }

    public function countTaggedPosts()
    {
        $this->taggedCount = $this->taggedPosts->count();
    }

    public function render()
    {
        return view('livewire.riwayattag', [
            'taggedPosts' => $this->taggedPosts,
            'taggedCount' => $this->taggedCount
        ])->extends('layouts.app')->section('content');
    }
}
