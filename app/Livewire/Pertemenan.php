<?php

namespace App\Livewire;

use App\Models\friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Pertemenan extends Component
{

    public $userId;
    public $friendships;
    public $totalPertemanan;

    public function mount($userId)
    {
        $this->userId = $userId;
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
        $this->friendships = Friendship::where(function ($query) {
            $query->where('user_id', $this->userId)
                  ->orWhere('friend_id', $this->userId);
        })
        ->where('status', 'approved')
        ->with(['user', 'friend'])
        ->withCount(['user as friend_count' => function ($query) {
            $query->selectRaw('count(*)');
        }])
        ->orderByDesc('friend_count')   
        ->get();

        $this->totalPertemanan = Friendship::where(function ($query) {
            $query->where('user_id', $this->userId)
                  ->orWhere('friend_id', $this->userId);
        })->where('status', 'approved')->count();
    
    }
    public function hapusPertemanan($friendId)
    {
        Friendship::where(function ($query) use ($friendId) {
            $query->where('user_id', Auth::id())
                  ->where('friend_id', $friendId);
        })->orWhere(function ($query) use ($friendId) {
            $query->where('user_id', $friendId)
                  ->where('friend_id', Auth::id());
        })->delete();

        session()->flash('message', 'Pertemanan berhasil dihapus.');
    }


    public function selectUser($userId)
    {
        return Redirect::route('detailpengguna', ['userId' => $userId]);
    }

    public function render()
{
    return view('livewire.pertemenan', [
        'friendships' => $this->friendships,
        'user' => Auth::user(), // Kirim user ke view
    ])->extends('layouts.app')->section('content');
}

}
