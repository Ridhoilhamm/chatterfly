<?php

namespace App\Livewire\Post;

use App\Models\Comment as ModelsComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $post;
    public $commentText;
    public $replyText = [];
    public $replyTo = null;

    public function addComment()
    {
        $this->validate(['commentText' => 'required']);

        ModelsComment::create([
            'post_foto_id' => $this->post->id,
            'user_id' => Auth::id(),
            'comment' => $this->commentText,
        ]);
        $this->reset('commentText');
        // dd($this->commentText);
    }

    public function addReply($parentId)
    {
        $this->validate([
            "replyText.$parentId" => 'required',
        ]);
    
        ModelsComment::create([
            'post_foto_id' => $this->post->id,
            'user_id' => Auth::id(),
            'comment' => $this->replyText[$parentId],
            'parent_id' => $parentId, // ← INI WAJIB ADA
        ]);
    
        $this->replyText[$parentId] = '';
    }
    
    public function getCommentCount()
    {
        return $this->post->comments()->count();
    }

    public function render()
    {
        return view('livewire.post.comment', [
            'comments' => $this->post->comments()
                            ->with(['user', 'replies.user']) 
                            ->whereNull('parent_id')    
                            ->latest()
                            ->get(),
            'commentCount' => $this->getCommentCount(),
        ]);        
    }
    
}
