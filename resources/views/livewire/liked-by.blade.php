<div>
    <h2>Daftar Like Berdasarkan Postingan</h2>
    <ul>
        @foreach ($likesPerPost as $post)
            <p>Post ID: {{ $post['post_id'] }}</p>
            <p>Caption: {{ $post['caption'] }}</p>
            <p>Jumlah Like: {{ $post['like_count'] }}</p>
            <p>Disukai oleh:</p>
            <ul>
                @foreach ($post['likers'] as $liker)
                    <li>{{ $liker }}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>
