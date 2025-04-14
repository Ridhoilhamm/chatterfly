<?php

namespace App\Livewire;

use App\Models\comment_video;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentVideo extends Component
{
    public $post;
    public $commentText;
    public $replyText = [];
    public $replyTo = null;

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

    public function addReply($parentId)
    {
        $this->validate([
            "replyText.$parentId" => 'required',
        ]);

        comment_video::create([
            'user_id' => Auth::id(),
            'comment' => $this->replyText[$parentId], // Gunakan $this->replyText[$parentId]
            'parent_id' => $parentId, // Gunakan $parentId yang diterima dari parameter
            'post_video_id' => $this->post->id, // ID video
        ]);

        // Reset reply text untuk reply tertentu
        $this->replyText[$parentId] = '';
    }

    public function getCommentCount()
    {
        return $this->post->comments()->count();
    }

    public function render()
    {
        return view('livewire.comment-video', [
            'comments' => $this->post->comments()
                            ->with(['user', 'replies.user']) 
                            ->whereNull('parent_id')        // hanya komentar utama
                            ->latest()
                            ->get(),
            'commentCount' => $this->getCommentCount(),
        ]);
    }
    
}
