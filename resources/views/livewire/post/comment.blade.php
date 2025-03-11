<div style="position: relative;">
    @foreach ($comments as $comment)
    {{-- <a href="{{ route('detailpengguna', $user->id) }}""> --}}
        <div class="d-flex align-items-start mb-3">
            <img src="{{ asset('storage/users-avatar/' . $comment->user->avatar) }}"
                class="rounded-circle me-2 text-center"
                style="width: 50px; height: 50px; object-fit: cover; margin-right:10px;">

            <div class="rounded"
                style="max-width: 90%; border-radius: 20px 20px 20px 5px; min-width: 50%; padding: 8px;">
                <strong style="font-size: 14px;">{{ $comment->user->name }}</strong>
                <p class="mb-1" style="font-size: 14px; line-height: 1.5;">{{ $comment->comment }}</p>
                <small class="text-muted">
                    {{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i A') }}
                </small>
                
            </div>
        </div>
    {{-- </a> --}}
    @endforeach

    <!-- Form Komentar -->
    <form wire:submit.prevent="addComment" class="comment-form">
        <input type="text" wire:model="commentText" placeholder="Tulis komentar..." />
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
            </svg></button>
    </form>
    <style>
        .comment-form {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            /* background: white; */
            padding: 10px;
            border-top: 1px solid #ddd;
            display: flex;
            align-items: center;
        }

        .comment-form input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
        }

        .comment-form button {
            background: #44AD9F;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>

</div>
