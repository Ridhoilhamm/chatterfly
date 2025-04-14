<?php

namespace App\Livewire;

use App\Models\post_foto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Arsippostinganall extends Component
{

    public $arsipPosts;
    public function render()
    {
        $this->arsipPosts = post_foto::where('is_arsip', true)
        ->where('user_id', Auth::id())
        ->latest()
        ->get();
        $countArsip = $this->arsipPosts->count();

        return view('livewire.arsippostinganall', [
            'arsipPosts' => $this->arsipPosts,
            'countArsip' => $countArsip,
        ])->extends('layouts.app')->section('content');
    }
}
