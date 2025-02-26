<div>
    <button wire:click="toggleFollow" class="btn {{ $isFollowing ? 'btn-danger' : 'btn-primary' }}">
        {{ $isFollowing ? 'Unfollow' : 'Follow' }}
    </button>

</div>

