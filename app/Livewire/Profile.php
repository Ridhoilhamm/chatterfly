<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\post_foto;
use App\Models\post_video;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $photo;
    public $caption;
    public $user;
    public $post;
    public $userId;
    public $selectedUser;
    public $postFotos;
    public $postVideos;
    public bool $isPrivate;
    public $pendingRequests;
    public $friendships;
    public $friendshipsCount;
    public $postCount;
    public $taggedPosts;


    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->forget('hideFooter');
        $this->userId = Auth::id();
        $this->user = User::findOrFail($this->userId);
        $this->postFotos = post_foto::with('user')->where('user_id', $this->userId)->latest()->get();
        $this->postVideos = post_video::with('user')->where('user_id', $this->userId)->latest()->get();
        $this->postCount = post_foto::where('user_id', $this->userId)->count();

        $this->isPrivate = Auth::check() ? (bool) Auth::user()->is_private : false;

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

            $this->taggedPosts = post_foto::whereHas('taggedFriends', function ($query) {
                $query->where('friend_id', $this->userId);
            })->with('user', 'taggedFriends')->latest()->get();
    }

    public function saveUserAndPostIdToSession($postId)
    {
        $post = post_foto::find($postId);
        
        // Debugging sebelum redirect
        // dd($postId, $post);
    
        if ($post) {
            session()->put('current_user_id', $post->user_id);
            session()->put('current_post_id', $postId);
            return redirect()->route('detailpostinganpribadi', [
                'user' => $post->user_id, 
                'post' => $postId
            ]);
        } else {
            return redirect()->route('home')->with('error', 'Post tidak ditemukan');
        }
    }
    

    public function togglePrivacy()
    {
        if (!Auth::check()) return;

        $user = Auth::user();
        $user->is_private = !$user->is_private;
        $user->save();

        $this->isPrivate = $user->is_private;

        $this->alert('success', 'Status akun berhasil diperbarui');
        return redirect()->route('profile');
    }

    public function uploadPhoto()
    {
        $this->validate([
            'photo' => 'image|max:2048', // Maksimal 2MB
            'caption' => 'nullable|string|max:255',
        ]);
        $path = $this->photo->store('uploads', 'public');

        post_foto::create([
            'user_id' => Auth::id(),
            'image_path' => $path,
            'caption' => $this->caption ?? null,
        ]);

        session()->flash('success', 'Foto berhasil diunggah!');

        $this->reset('photo', 'caption');
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        return view('livewire.profile', [
            'selectedUser' => $this->selectedUser,
            'taggedPosts' => $this->taggedPosts,
        ])->extends('layouts.app')->section('content');
    }
    
    
}
