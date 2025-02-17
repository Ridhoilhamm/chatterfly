<?php

namespace App\Livewire;

use Livewire\Component;

class DaftarPengguna extends Component
{

    public $userId;

    protected $listeners = ['userSelected' => 'handleUserSelected'];

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 
    }

    public function handleUserSelected($userId)
    {
        $this->userId = $userId;
    }
    public function render()
    {
        $user = $this->userId ? \App\Models\User::find($this->userId) : null;
        return view('livewire.daftar-pengguna',compact('user'))
        ->extends('layouts.app')
        ->section('content');
    }
}
