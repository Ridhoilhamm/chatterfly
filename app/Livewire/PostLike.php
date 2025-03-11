<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\post_foto;
use App\Models\PostFoto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostLike extends Component
{
    public $post;
    public $isLiked;
    public $likeCount;

    public function mount(post_foto $post)
    {
        $this->post = $post;
        $this->likeCount = $post->likes()->count();
        $this->isLiked = $post->likes()->where('user_id', Auth::id())->exists();
    }

    public function toggleLike()
    {
        if ($this->isLiked) {
            Like::where('user_id', Auth::id())->where('post_foto_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likeCount--;
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'post_foto_id' => $this->post->id,
            ]);
            $this->isLiked = true;
            $this->likeCount++;
        }
    }

    public function render()
    {
        return view('livewire.post-like');
    }
}
