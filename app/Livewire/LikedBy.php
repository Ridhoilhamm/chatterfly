<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\User;
use App\Models\post_foto;
use Livewire\Component;

class LikedBy extends Component
{
    public $userId;
    public $user;
    public $likesPerPost = [];

    public function mount($userId)
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
        
        $this->userId = $userId;
        $this->user = User::find($userId);

        // Ambil semua postingan milik user beserta likes dan user yang menyukai
        $posts = post_foto::where('user_id', $this->userId)
            ->with(['likes.user']) // Mengambil data user yang melakukan like
            ->get();

        // Format data untuk tampilan
        $this->likesPerPost = $posts->map(function ($post) {
            return [
                'post_id' => $post->id,
                'caption' => $post->caption,
                'like_count' => $post->likes->count(), // Hitung jumlah like
                'likers' => $post->likes->map(function ($like) {
                    return $like->user->name ?? 'Anonim'; // Ambil nama user atau tampilkan 'Anonim'
                })
            ];
        });
    }

    public function render()
    {
        return view('livewire.liked-by', [
            'likesPerPost' => $this->likesPerPost
        ])->extends('layouts.app')->section('content');
    }
}
