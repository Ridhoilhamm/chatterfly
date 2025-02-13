<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Page extends Component
{
    public $users;

    public function mount()
    {
        session()->put('hideNavbar', true);
        $this->users = User::where('id', '!=', Auth::id())->get();
    }


    public function render()
    {
        return view('livewire.page')
        ->extends('layouts.app')
        ->section('content');
    }
}
