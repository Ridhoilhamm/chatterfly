<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;

class HalamanAndaKenal extends Component
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
        return view('livewire.halaman-anda-kenal', [
            'users' => $this->users,
        ])->extends('layouts.app')->section('content');
    }
}
