<div class="d-flex">
    @php
        $currentUserId = auth()->id();
        $viewedUserId = request()->segment(2);
    @endphp

    <!-- Tombol Obrolan -->
    <a
        href="{{ $friendshipStatus && optional($friendshipStatus)->status == 'approved' && (optional($friendshipStatus)->user_id == $currentUserId || optional($friendshipStatus)->friend_id == $currentUserId) ? url('/chatify/' . $viewedUserId) : 'javascript:void(0);' }}">
        <button class="btn fs-7 me-2 bg-transparent px-4"
            style="width: 115px; border-radius: 10px; padding-right: 35px; padding-left: 35px; margin-right:10px; 
            {{ !$friendshipStatus || optional($friendshipStatus)->status != 'approved' || (optional($friendshipStatus)->user_id != $currentUserId && optional($friendshipStatus)->friend_id != $currentUserId) ? 'color: var(--bs-secondary); border-color: var(--bs-secondary); opacity: 0.5; cursor: not-allowed;' : 'color: var(--bs-primary); border-color: var(--bs-primary);' }}"
            {{ !$friendshipStatus || optional($friendshipStatus)->status != 'approved' || (optional($friendshipStatus)->user_id != $currentUserId && optional($friendshipStatus)->friend_id != $currentUserId) ? 'disabled' : '' }}>
            Obrolan
        </button>
    </a>

    <!-- Tombol Undang -->
    <button class="btn fs-7"
    wire:click="invite({{ intval($viewedUserId) }})"
    style="width: 115px; border-radius: 10px; border: none; background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); color: white;">
    @if (!$friendshipStatus)
        Undang
    @elseif ($friendshipStatus->status === 'pending' && $friendshipStatus->user_id === auth()->id())
        Menunggu Konfirmasi
    @elseif ($friendshipStatus->status === 'pending' && $friendshipStatus->friend_id === auth()->id())
        Terima Permintaan
    @elseif ($friendshipStatus->status === 'approved')
        Berteman
    @endif
</button>



</div>
