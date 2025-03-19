<?php

namespace App\Livewire;

use App\Models\post_foto_tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Riwayattag extends Component
{
    public $taggedUsers;

    public function mount()
    {
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true); 

        // Ambil data tag hanya untuk user yang sedang login
        $this->getTaggedUsers();
    }

    public function getTaggedUsers()
    {
        $this->taggedUsers = post_foto_tag::where('id', Auth::id())
            ->with(['post', 'post.user']) // Ambil juga user yang menandai
            ->latest()
            ->get();
    }

    public function render()
    {
        return view('livewire.riwayattag', [
            'taggedUsers' => $this->taggedUsers
        ])->extends('layouts.app')->section('content');
    }
}
