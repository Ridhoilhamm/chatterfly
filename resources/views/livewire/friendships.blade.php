<div class="d-flex">
    @php
        $currentUserId = auth()->id();
        $viewedUserId = request()->segment(2);
    @endphp
    <a
        href="{{ $friendshipStatus && $friendshipStatus->status == 'approved' ? url('/chatify/' . $viewedUserId) : 'javascript:void(0);' }}">
        <button class="btn fs-7 me-2 bg-transparent px-4"
            style="width: 115px; border-radius: 10px; margin-right:10px;
            {{ !$friendshipStatus || $friendshipStatus->status != 'approved' ? 'color: var(--bs-secondary); border-color: var(--bs-secondary); opacity: 0.5; cursor: not-allowed;' : 'color: var(--bs-primary); border-color: var(--bs-primary);' }}"
            {{ !$friendshipStatus || $friendshipStatus->status != 'approved' ? 'disabled' : '' }}>
            Obrolan
        </button>
    </a>
    <button class="btn fs-7" wire:click="invite({{ intval($viewedUserId) }})"
        style="width: 115px; border-radius: 10px; border: none; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color: white;">
        @if (!$friendshipStatus)
            Undang
        @elseif ($friendshipStatus->status === 'pending' && $friendshipStatus->user_id === auth()->id())
            Menunggu
        @elseif ($friendshipStatus->status === 'pending' && $friendshipStatus->friend_id === auth()->id())
            Terima Permintaan
        @elseif ($friendshipStatus->status === 'approved')
            Berteman
        @endif
    </button>
</div>
