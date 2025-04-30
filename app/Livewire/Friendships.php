<?php

namespace App\Livewire;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Friendships extends Component
{
    use LivewireAlert;

    public $friendships;
    public $userId;
    public $friendshipStatus;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);

        $this->userId = Auth::id();
        $viewedUserId = request()->segment(2); // ambil user yang dilihat

        // Ambil daftar teman
        $this->friendships = Friendship::where('status', 'approved')
            ->where(function ($query) {
                $query->where('user_id', $this->userId)
                    ->orWhere('friend_id', $this->userId);
            })
            ->with(['friend', 'user'])
            ->get()
            ->map(function ($friendship) {
                return $friendship->user_id === $this->userId ? $friendship->friend : $friendship->user;
            });

        // Ambil status pertemanan antara user yang login dan user yang sedang dilihat
        $this->friendshipStatus = $this->getFriendshipStatus($viewedUserId);
    }

    public function getFriendshipStatus($viewedUserId)
    {
        return Friendship::where(function ($query) use ($viewedUserId) {
            $query->where('user_id', $this->userId)
                ->where('friend_id', $viewedUserId);
        })->orWhere(function ($query) use ($viewedUserId) {
            $query->where('user_id', $viewedUserId)
                ->where('friend_id', $this->userId);
        })->first();
    }

    public function invite($friendId)
    {
        $friendId = (int) $friendId;

        if ($friendId === $this->userId) {
            $this->alert('error', 'Anda tidak bisa mengirim permintaan ke diri sendiri!');
            return;
        }

        if (!User::find($friendId)) {
            $this->alert('error', 'User tidak ditemukan!');
            return;
        }

        $existingFriendship = $this->getFriendshipStatus($friendId);

        if ($existingFriendship) {
            if ($existingFriendship->status === 'approved') {
                $this->alert('error', 'Kalian sudah berteman!');
            } elseif ($existingFriendship->status === 'pending' && $existingFriendship->user_id === $this->userId) {
                $this->alert('error', 'Permintaan sudah terkirim!');
            } elseif ($existingFriendship->status === 'pending' && $existingFriendship->friend_id === $this->userId) {
                $this->alert('info', 'User ini telah mengirim permintaan kepada Anda. Silakan konfirmasi!');
            }
            return;
        }

        Friendship::create([
            'user_id' => $this->userId,
            'friend_id' => $friendId,
            'status' => 'pending',
        ]);

        $this->alert('success', 'Berhasil mengirim permintaan pertemanan!');
        $this->friendshipStatus = $this->getFriendshipStatus($friendId);
    }

    public function render()
    {
        return view('livewire.friendships', [
            'friendshipStatus' => $this->friendshipStatus,
            'userId' => $this->userId,
        ])->extends('layouts.app')->section('content');
    }
}
