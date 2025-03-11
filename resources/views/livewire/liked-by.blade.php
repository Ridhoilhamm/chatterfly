<div class="container">
    <h3 class="fw-bold">Pengguna yang menyukai {{ $user->name }}</h3>
    
    <ul>
        @forelse ($likers as $like)
            <li>{{ $like->user->name }}</li>
        @empty
            <li>Tidak ada yang menyukai pengguna ini.</li>
        @endforelse
    </ul>
</div>
