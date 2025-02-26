<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DetailPostingan extends Component
{
    public $users;
    public $selectedUserId;
    public $posts = [];

    public function mount()
    {
        $this->users = User::all();
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);  
    }

    public function updatedSelectedUserId()
    {
        if ($this->selectedUserId) {
            $this->posts = User::find($this->selectedUserId)?->posts ?? [];
        }
    }

    public function render()
    {
        return view('livewire.detail-postingan', [
            'users' => $this->users,
            'posts' => $this->posts
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}

