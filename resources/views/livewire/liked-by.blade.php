<div>
    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-3 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="{{ URL::previous() }}" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Postinganmu disukai oleh</p>

            <span class="px-3 py-1 rounded text-white"
                style="
                background: linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141));">
            </span>
        </div>
    </div>
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            @forelse ($likers as $like)
                @if ($like->user)
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('storage/users-avatar/' . $like->user->avatar) }}" 
                            alt="Avatar" class="rounded-circle me-2" 
                            style="width: 40px; height: 40px; object-fit: cover;">
                        <span class="fw-semibold">{{ $like->user->name }}</span>
                    </div>
                @endif
            @empty
                <p class="text-muted text-center">Tidak ada yang menyukai pengguna ini.</p>
            @endforelse
        </div>
    </div>

    <style>
         a {
                color: inherit;
                text-decoration: none;
            }

    </style>
</div>
