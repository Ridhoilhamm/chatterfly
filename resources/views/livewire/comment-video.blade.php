<div style="position: relative;">
    @foreach ($comments as $comment)
        <div class="d-flex align-items-start mb-3">
            <img src="{{ asset('storage/users-avatar/' . $comment->user->avatar) }}"
                class="rounded-circle me-2 text-center"
                style="width: 50px; height: 50px; object-fit: cover; margin-right:10px;">

            <div class="rounded"
                style="max-width: 90%; border-radius: 20px 20px 20px 5px; min-width: 50%; padding: 8px;">
                <strong style="font-size: 14px;">{{ $comment->user->name }}</strong>
                <p class="mb-1" style="font-size: 14px; line-height: 1.5;">{{ $comment->comment }}</p>
                <small class="text-muted">
                    {{ $comment->created_at->setTimezone('Asia/Jakarta')->format('d M Y, h:i A') }}
                </small>

                <span wire:click="$set('replyTo', {{ $comment->id }})"
                    style="cursor: pointer; color: blue;">Balas</span>

                @if ($replyTo === $comment->id)
                    <form wire:submit.prevent="addReply({{ $comment->id }})" class="mt-2">
                        <textarea wire:model.defer="replyText.{{ $comment->id }}" class="form-control"
                            placeholder="Tulis balasan..."></textarea>
                        <div class="d-flex justify-content-end mt-1">
                            <button type="submit" class="btn"
                                style="width: 60px; height: 40px;
                                    background: linear-gradient(to right, rgba(68, 173, 159, 0.9),
                                    rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3));
                                    color: white; border: none; border-radius: 8px;
                                    font-weight: bold; display: flex;
                                    align-items: center; justify-content: center;">
                                Kirim
                            </button>
                        </div>
                    </form>
                @endif

                {{-- Replies --}}
                <div class="ml-4 mt-2">
                    @foreach ($comment->replies as $reply)
                        <div class="d-flex align-items-start mb-2">
                            <img src="{{ asset('storage/users-avatar/' . $reply->user->avatar) }}"
                                class="rounded-circle me-2 text-center"
                                style="width: 30px; height: 30px; object-fit: cover; margin-right:10px;">
                            <div style="background: #f0f0f0; border-radius: 15px; padding: 6px 10px; max-width: 80%;">
                                <strong style="font-size: 13px;">{{ $reply->user->name }}</strong>
                                <p style="margin: 0; font-size: 13px;">{{ $reply->comment }}</p>
                                <small class="text-muted">{{ $reply->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    {{-- Form Komentar --}}
    <form wire:submit.prevent="addComment" class="comment-form">
        <input type="text" wire:model="commentText" placeholder="Tulis komentar..." />
        <button type="submit"
            class="btn btn-primary d-flex align-items-center justify-content-center p-2 rounded-circle"
            style="width: 40px; height: 40px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icon-tabler-brand-telegram">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
            </svg>
        </button>
    </form>

    {{-- Style --}}
    <style>
        .comment-form {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            border-top: 1px solid #ddd;
            display: flex;
            align-items: center;
            background: #fff;
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
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
</div>
