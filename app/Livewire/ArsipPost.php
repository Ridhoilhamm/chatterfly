<?php

namespace App\Livewire;

use App\Models\post_foto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ArsipPost extends Component
{
    public $postId;
    use LivewireAlert;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function arsipkan()
    {
        $post = post_foto::find($this->postId);

        if ($post && !$post->is_arsip) {
            $post->is_arsip = true;
            $post->save();

            $this->alert('success', 'Foto berhasil diarsipkan ');
        }
    }

    public function render()
    {
        return view('livewire.arsip-post');
    }
}
