<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $userId; // <- Tambahkan ini agar dikenali oleh Livewire
    public $selectedUser;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter');

        // Ambil semua user kecuali yang sedang login
        $this->user = User::where('id', '!=', Auth::id())->get();
    }

    public function handleUserSelected($userId)
    {
        $this->userId = $userId;
        $this->selectedUser = User::with('followers')->find($this->userId);
    }

    public function render()
    {
        return view('livewire.profile', [
            'selectedUser' => $this->selectedUser
        ])->extends('layouts.app')->section('content');
    }
}

