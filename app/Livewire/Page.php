<?php

namespace App\Livewire;

use App\Models\banners;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Page extends Component
{
    public $users;
    public $selectedUserId;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter'); 
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function selectUser($userId)
    {
        // Arahkan ke halaman detail pengguna menggunakan route
        return Redirect::route('detailpengguna', ['userId' => $userId]);
    }


    public function render()
    {
        $users = Auth::user();
        $banners = banners::all();
        return view('livewire.page',compact('users','banners'))
        ->extends('layouts.app')
        ->section('content');
    }
}
