<?php

namespace App\Livewire;

use App\Models\post_foto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Uploadfoto extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $photo;
    public $caption;
    public $selectedFriends = [];
    public $friends;

    public function mount()
    {
        $this->friends = User::where('id', '!=', Auth::id())->get();
    }

    public function updatedPhoto()
    {
        $this->dispatch('show-photo-modal');
    }

    public function uploadPhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:2048',
            'caption' => 'nullable|string|max:255',
            'selectedFriends' => 'array',
        ]);

        $path = $this->photo->store('uploads', 'public');

        $post = post_foto::create([
            'user_id' => Auth::id(),
            'image_path' => $path,
            'caption' => $this->caption,
        ]);

        if (!empty($this->selectedFriends)) {
            $post->taggedFriends()->attach($this->selectedFriends);
        }

        $this->alert('success', 'Foto berhasil diunggah!');

        $this->reset(['photo', 'caption', 'selectedFriends']);

        $this->dispatch('hide-photo-modal');
    }

    public function render()
    {
        return view('livewire.uploadfoto')
            ->extends('layouts.app')
            ->section('content');
    }
}
