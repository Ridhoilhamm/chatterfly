<?php

namespace App\Livewire;

use App\Models\post_foto;
use App\Models\User;
use Livewire\Component;

class Detailpostinganpribadi extends Component
{
    public $user;
    public $posts;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
        $this->posts = post_foto::where('user_id', $this->user->id)->get();
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }

    public function render()
    {
        return view('livewire.detailpostinganpribadi',[
            'user' => $this->user,
            'posts' => $this->posts
        ])->extends('layouts.app')->section('content');
    }
}
