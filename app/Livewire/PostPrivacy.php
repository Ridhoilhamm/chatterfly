<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\post_foto;
use App\Models\User;

class PostPrivacy extends Component
{
    public $post;
    public $isBlurred = true;

    public function mount(post_foto $post)
    {
        $this->post = $post;
        $this->checkPrivacy();
    }

    public function checkPrivacy()
    {
        $user = Auth::user();
        $postOwner = User::find($this->post->user_id);

        // Jika pemilik akun private dan user belum follow, blur postingan
        if ($postOwner->is_private && (!$user || !$user->isFollowing($postOwner->id))) {
            $this->isBlurred = true;
        } else {
            $this->isBlurred = false;
        }
    }

    public function render()
    {
        return view('livewire.post-privacy');
    }
}
