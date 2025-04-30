<?php

namespace App\Livewire;

use App\Models\Friendship;
use App\Models\post_foto;
use App\Models\post_video; // Tambahkan model post_video
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarPengguna extends Component
{
    public $userId;
    public $postFotos = [];
    public $postVideos = []; // Tambahkan variabel untuk menyimpan video
    public $friendshipStatus = [];
    public $friendshipsCount;
    public $taggedPosts;

    protected $listeners = ['userSelected' => 'handleUserSelected'];

    public function mount($userId = null)
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
        $this->userId = $userId ?? Auth::id();
        $this->getFriendshipStatus();
        $this->getPostFotos();
        $this->getPostVideos(); // Panggil function untuk mengambil video

        if ($userId) {
            $this->userId = $userId;
            $this->getFollowersCount();
        }
        $this->taggedPosts = post_foto::whereHas('taggedFriends', function ($query) {
            $query->where('friend_id', $this->userId);
        })->with('user', 'taggedFriends')->latest()->get();
    }

    private function isFriend($authUserId, $postOwnerId)
    {
        return Friendship::where(function ($query) use ($authUserId, $postOwnerId) {
            $query->where([
                ['user_id', $authUserId],
                ['friend_id', $postOwnerId],
                ['status', 'approved'],
            ])->orWhere([
                ['user_id', $postOwnerId],
                ['friend_id', $authUserId],
                ['status', 'approved'],
            ]);
        })->exists();
    }

    public function getFollowersCount()
    {
        if ($this->userId) {
            $this->friendshipsCount = Friendship::where([
                ['friend_id', $this->userId],
                ['status', 'approved'] 
            ])->count();
        }
    }

    public function getFriendshipStatus()
    {
        $authUserId = Auth::id();

        $this->friendshipStatus = Friendship::where('status', 'approved')
            ->where(function ($query) use ($authUserId) {
                $query->where('user_id', $authUserId)
                    ->orWhere('friend_id', $authUserId);
            })
            ->get()
            ->mapWithKeys(function ($friendship) use ($authUserId) {
                $friendId = $friendship->user_id == $authUserId ? $friendship->friend_id : $friendship->user_id;
                return [$friendId => true];
            })
            ->toArray();
    }


    public function getPostFotos()
    {
        $authUserId = Auth::id();

        $this->postFotos = post_foto::with(['user' => function ($query) {
            $query->select('id', 'is_private');
        }])
            ->whereHas('user')
            ->when($this->userId, function ($query) {
                return $query->where('user_id', $this->userId);
            })
            ->latest()
            ->get()
            ->map(function ($foto) use ($authUserId) {
                if ($foto->user) {
                    $isFriend = isset($this->friendshipStatus[$foto->user->id]);
                    $foto->isBlurred = ($foto->user->is_private && !$isFriend);
                } else {
                    $foto->isBlurred = false;
                }
                return $foto;
            });
    }


    public function getPostVideos()
    {
        $authUserId = Auth::id();

        $this->postVideos = post_video::with(['user' => function ($query) {
            $query->select('id', 'is_private');
        }])
            ->whereHas('user')
            ->when($this->userId, function ($query) {
                return $query->where('user_id', $this->userId);
            })
            ->latest()
            ->get()
            ->map(function ($video) use ($authUserId) {
                if ($video->user) {
                    $isFriend = isset($this->friendshipStatus[$video->user->id]);
                    $video->isBlurred = ($video->user->is_private && !$isFriend);
                } else {
                    $video->isBlurred = false;
                }
                return $video;
            });
    }

    
    public function render()
    {
        $user = $this->userId ? User::find($this->userId) : null;

        return view('livewire.daftar-pengguna', [
            'user' => $user,
            'postFotos' => $this->postFotos,
            'taggedPosts' => $this->taggedPosts,
            'postVideos' => $this->postVideos, // Kirim video ke blade
        ])->extends('layouts.app')->section('content');
    }
}
