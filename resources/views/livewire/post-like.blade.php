<div>
    <button wire:click="toggleLike" class="like-btn border-0 bg-transparent align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="{{ $isLiked ? 'red' : 'white' }}" class="icon icon-tabler icons-tabler-filled icon-tabler-heart mb-0">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" />
        </svg>
        <p class="mb-0 ms-1 mt-0 text-white">{{ $likeCount }}</p>
    </button>
    

    <style>
        .like-btn {
            background: none;
            border: none;
            color: red;
            font-size: 16px;
            cursor: pointer;
            padding: 5px;
            margin-bottom: 0px;
        }

        .like-btn:focus {
            outline: none;
        }
    </style>

</div>
