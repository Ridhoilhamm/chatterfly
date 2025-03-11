<?php

namespace App\Livewire;

use App\Models\post_video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detailvideo extends Component
{
    public $user;
    public $videos = [];
    public $posts;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
        $this->videos = post_video::where('user_id', $this->user->id)->get();
        $this->posts = post_video::where('user_id', $this->user->id)->get();
    }
    public function render()
    {
        return view('livewire.detailvideo', [
            'user' => $this->user,
            'posts' => $this->posts
        ])
        ->extends('layouts.app')->section('content');
    }
}
