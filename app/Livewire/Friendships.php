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
    public $friendshipsCount;
    public $friendshipStatus;
    
    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 

        $this->userId = Auth::id();

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


        
        $this->getFriendshipCount();

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
    
        $existingFriendship = Friendship::where(function ($query) use ($friendId) {
            $query->where('user_id', $this->userId)
                ->where('friend_id', $friendId);
        })->orWhere(function ($query) use ($friendId) {
            $query->where('user_id', $friendId)
                ->where('friend_id', $this->userId);
        })->first();
    
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
        $this->getFriendshipCount();
    }
    

    public function getFriendshipCount()
    {
        $this->friendshipsCount = Friendship::where('status', 'approved')
            ->where(function ($query) {
                $query->where('user_id', $this->userId)
                    ->orWhere('friend_id', $this->userId);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.friendships', [
            'friendshipStatus' => $this->friendshipsCount,
            'userId' => $this->userId,
        ])->extends('layouts.app')
          ->section('content');
    }
}
