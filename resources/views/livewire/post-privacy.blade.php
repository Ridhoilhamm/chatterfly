<div>
    @if($isBlurred)
        <div class="blur-overlay">
            <p>Konten ini bersifat privat. Ikuti pengguna ini untuk melihat postingan.</p>
        </div>
    @else
        <div class="content">
            @if($post->media_type === 'image')
                <img src="{{ asset('storage/uploads/' . $post->media_path) }}" class="large">
            @elseif($post->media_type === 'video')
                <video class="large" controls>
                    <source src="{{ asset($post->media_path) }}" type="video/mp4">
                </video>
            @endif
        </div>
    @endif
    <style>
        .blur-overlay {
            filter: blur(10px);
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
        }
    </style>
</div>

