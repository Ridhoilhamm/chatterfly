<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListPertemenan extends Component
{
    public $usersWithFriends;

    public function mount()
    {

        $this->usersWithFriends = User::with('friends')->get();
    }

    public function render()
    {
        return view('livewire.admin.list-pertemenan')
            ->extends('layouts.app')
            ->section('content');
    }
}
