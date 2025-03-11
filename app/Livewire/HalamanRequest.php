<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HalamanRequest extends Component
{
    public $friendships;
    public $friendshipsCount;
    public $pendingRequests;
    public $userId;



    public function mount(){
        $this->userId = Auth::id(); 
        $this->friendships = DB::table('friendships')
            ->join('users', 'friendships.friend_id', '=', 'users.id')
            ->where(function ($query) {
                $query->where('friendships.user_id', $this->userId)
                    ->orWhere('friendships.friend_id', $this->userId);
            })
            ->where('friendships.status', 'approved')
            ->select('users.id', 'users.name', 'users.avatar')
            ->get();


        $this->friendshipsCount = DB::table('friendships')
            ->select('friend_id', DB::raw('COUNT(*) as total'))
            ->where('status', 'approved')
            ->groupBy('friend_id')
            ->pluck('total', 'friend_id')
            ->toArray();

        $this->pendingRequests = DB::table('friendships')
            ->join('users', 'friendships.user_id', '=', 'users.id')
            ->where('friendships.friend_id', $this->userId)
            ->where('friendships.status', 'pending')
            ->select('users.id', 'users.name', 'users.avatar')
            ->get();
    }

    public function render()
    {
        return view('livewire.halaman-request')
        ->extends('layouts.app')->section('content');
    }
}
