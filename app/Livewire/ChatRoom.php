<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class ChatRoom extends Component
{
    public $group;
    public $message;
    public $messages;

    protected $listeners = ['messageReceived' => 'refreshMessages'];

    public function mount(Group $group)
    {
        $this->group = $group;
        $this->refreshMessages();
    }

    public function sendMessage()
    {
        $conversation = Conversation::create([
            'group_id' => $this->group->id,
            'user_id' => Auth::id(),
            'message' => $this->message,
        ]);

        $this->message = '';

        broadcast(new \App\Events\NewMessage($conversation))->toOthers();

        $this->refreshMessages();
    }

    public function refreshMessages()
    {
        $this->messages = Conversation::where('group_id', $this->group->id)
            ->with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();
    }

    public function render()
    {
        return view('livewire.chat-room');
    }
}

