<?php

namespace App\Livewire;

use App\Models\post_foto;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Detailpostinganpribadi extends Component
{

    use LivewireAlert;
    public $user;
    public $posts;
    public $editCaptionId;
    public $newCaption;


    public function mount($user)
    {
        $this->user = User::findOrFail($user);
        $this->posts = post_foto::where('user_id', $this->user->id)->get();
        session()->put('hideNavbar', true);
        session()->put('hideFooter', true);
    }

    public function editCaption($postId)
    {
        $post = post_foto::find($postId);
        if ($post) {
            $this->editCaptionId = $post->id;
            $this->newCaption = $post->caption;
        }
    }

    public function updateCaption()
    {
        $post = post_foto::find($this->editCaptionId);
        if ($post) {
            $post->caption = $this->newCaption;
            $post->save();
            $this->alert('success', 'Caption berhasil diperbarui');
    
            // Reset input biar nggak ketimpa di modal
            $this->newCaption = '';
    
        }
    }
    

    public function hapusPostingan($postId)
    {
        $post = post_foto::find($postId);

        if ($post) {
            $post->delete();
            $this->alert('success', 'Postingan Anda Berhasil Dihapus');
        }
    }

    public function arsipkan($postId)
    {
        $post = post_foto::find($postId);
    
        if ($post && !$post->is_arsip) {
            $post->is_arsip = true;
            $post->save();
    
            $this->alert('success', 'Foto berhasil diarsipkan ');
        }
    }
    

    public function render()
    {
        return view('livewire.detailpostinganpribadi', [
            'user' => $this->user,
            'posts' => $this->posts
        ])->extends('layouts.app')->section('content');
    }
}
