<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Selebritis extends Component
{
    public $users;

    public function mount()
    {
        $authUserId = Auth::id();

        // Ambil semua user yang belum berteman dengan user yang login
        $this->users = User::where('id', '!=', $authUserId)
            ->whereNotIn('id', function ($query) use ($authUserId) {
                $query->select('friend_id')
                    ->from('friendships')
                    ->where('user_id', $authUserId);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.selebritis', [
            'users' => $this->users
        ])
        ->extends('layouts.app')->section('content');
    }
}
