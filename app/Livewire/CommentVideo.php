<?php

namespace App\Livewire;

use App\Models\comment_video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentVideo extends Component

{
    public $post;
    public $commentText;

    public function addComment()
    {
        $this->validate(['commentText' => 'required']);

        comment_video::create([
            'post_video_id' => $this->post->id,
            'user_id' => Auth::id(),
            'comment' => $this->commentText,
        ]);

        $this->reset('commentText');
    }

    public function getCommentCount()
    {
        return $this->post->comments()->count();
    }

    public function render()
    {
        return view('livewire.comment-video', [
            'comments' => $this->post->comments()->with('user')->latest()->get(),
            'commentCount' => $this->getCommentCount(),
        ]);
    }
}
