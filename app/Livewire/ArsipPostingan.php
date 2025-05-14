<?php

namespace App\Livewire;

use App\Models\post_foto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ArsipPostingan extends Component
{
    use LivewireAlert;
    public $arsipPosts;
    public $postIdToDelete = null;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
    }

    public function unarsip($id)
    {
        $post = post_foto::where('user_id', Auth::id())->findOrFail($id);
        $post->is_arsip = false;
        $post->save();
        $this->arsipPosts = post_foto::where('is_arsip', true)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function deleteArsip()
    {
        $post = post_foto::where('user_id', Auth::id())
            ->where('is_arsip', true)
            ->findOrFail($this->postIdToDelete);
    
        $post->delete();
    
        $this->postIdToDelete = null;
        session()->flash('message', 'Postingan berhasil dihapus.');
    }

    public function render()
    {
        $this->arsipPosts = post_foto::where('is_arsip', true)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.arsip-postingan', [
            'arsipPosts' => $this->arsipPosts,
        ])->extends('layouts.app')->section('content');
    }
}
