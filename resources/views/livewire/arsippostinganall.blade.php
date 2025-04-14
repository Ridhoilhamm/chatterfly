<div class=" container full-height bg-white">
    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-1 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="{{route('bio')}}" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Arsip Postingan</p>
            <span class="px-3 py-1 rounded text-white"
                style="
            background: linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141));">{{ $countArsip }}
            </span>
        </div>
    </div>
    <div class="row ful-height bg-white " style="margin-top:44px;">
        @forelse ($arsipPosts as $post)
            <div class="col-4 mt-1 p-2">
                <div class="ratio ratio-1x1 overflow-hidden">
                    <a href="{{route('arsippostingan')}}">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Foto"
                        style="object-fit: cover; width: 100%; height: 150px; border-radius:8px;">
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-3">
                <p>Tidak ada postingan yang diarsipkan.</p>
            </div>
        @endforelse
    </div>
    <style>
        .full-height {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</div>
