<?php

namespace App\Livewire\Post;

use App\Models\shared_post;
use App\Models\SharedPost;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShareButton extends Component
{
    use LivewireAlert;
    public $receiverId;
    public $postId;


    protected $listeners = ['setReceiver'];

    public function setReceiver($id)
    {
        $this->receiverId = $id;
    }


    public function share()
    {
        shared_post::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiverId,
            'post_foto_id' => $this->postId,
        ]);

        $this->dispatch('postShared');
        $this->alert('success', 'Berhasil membagikan postingan ke teman');
    }

    public function render()
    {
        return view('livewire.post.share-button');
    }
}
