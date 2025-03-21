<div>
    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-3 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="/bio" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Riwayat Menandai Postingan Kamu</p>

            <span class="px-3 py-1 rounded text-white"
                style="
                background: linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141));">
                 {{ $taggedCount }}
            </span>
        </div>
    </div>
    <div style="margin-top:30px;">
        <div class="full-height bg-white p-2 pt-5">
            @if ($taggedPosts->isEmpty())
                <p class="text-muted text-center">Tidak ada yang menandai Anda.</p>
            @else
                <div class="list-group">
                    @foreach ($taggedPosts as $tag)
                    <div class="list-group-item d-flex align-items-center p-3 border-bottom">
                        <img src="{{ asset('storage/users-avatar/' . ($tag->user->avatar ?? 'default.png')) }}"
                            alt="Avatar" 
                            class="rounded-circle"
                            style="width: 40px; height: 40px; object-fit: cover; display: block; aspect-ratio: 1/1;">
                        <div class="ml-4">
                            <a href="{{ route('detailpengguna', $tag->user->id ?? '#') }}">
                                <strong>{{ Str::limit($tag->user->name ?? 'Pengguna Tidak Diketahui', 15, '.') }}</strong>  
                                <span class="text-muted">menandai Anda dalam sebuah postingannya.</span>
                            </a>
                        </div>
                    </div>
                @endforeach
                
                </div>
            @endif
        </div>  
    </div>

    <style>
        a {
            color: inherit;
            text-decoration: none;
        }

        .full-height {
            min-height: 100vh;
            /* Set tinggi minimal 100% dari viewport */
            display: flex;
            flex-direction: column;
        }
    </style>

</div>
