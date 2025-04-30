<div>
    <div class="chat-box">
        @foreach($messages as $msg)
            <div><strong>{{ $msg->user->name }}:</strong> {{ $msg->message }}</div>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model="message" placeholder="Type your message..." />
        <button type="submit">Send</button>
    </form>
</div>
