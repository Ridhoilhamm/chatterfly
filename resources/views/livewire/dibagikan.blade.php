<div>
    <h4>Post yang Dibagikan Kepadamu</h4>
    @forelse($sharedPosts as $shared)
        <div class="card mb-3">
            <div class="card-body">
                @php
            @endphp
                <h5>{{ $shared->post->caption ?? 'Tanpa Judul' }}</h5>
                <img src="{{ asset('storage/' . $shared->post->image_path) }}" alt="Foto"  style="object-fit: cover; width: 100%; height: 100%; border-radius:8px;">
            </div>
        </div>
        <p>Dibagikan oleh: {{ $shared->sender->name }}</p>
    @empty
        <p>Tidak ada post yang dibagikan.</p>
    @endforelse
</div>
