<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $users;
    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter'); //
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.profile')
        ->extends('layouts.app')
        ->section('content');
    }
}
