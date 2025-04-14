<?php

namespace App\Livewire;

use App\Models\shared_post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dibagikan extends Component
{
    public $sharedPosts;

    public function mount()
    {
        $userId = Auth::id();

        $this->sharedPosts = shared_post::with('post')
            ->where('receiver_id', $userId)
            ->get();
    }

    public function render()
    {
        
        return view('livewire.dibagikan') ->extends('layouts.app')
        ->section('content');
    }
}
