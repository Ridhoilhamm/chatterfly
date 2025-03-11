<div>
    @if ($isFollowing)
        <button class="btn btn-success">Sudah Berteman</button>
    @elseif ($isRequested)
        <button wire:click="toggleFollowRequest" class="btn btn-warning">Batalkan Permintaan</button>
    @else
        <button wire:click="toggleFollowRequest" class="btn btn-primary">Kirim Permintaan</button>
    @endif
</div>
