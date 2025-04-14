<div>
    <div class="bg-white d-flex align-items-center fixed-top justify-content-between p-1 border-bottom shadow-sm ">
        <div class="d-flex align-items-center">
            <a href="{{route('listarsippostingan')}}" class="mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left me-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="mb-0  me-2 " style="margin-right:10px; font-size:18px;">Halaman Arsip Postingan</p>
        </div>
    </div>
    <div class="bg-white">
        @forelse ($arsipPosts as $post)
            <div class="mb-2 border rounded d-flex justify-content-center">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Foto"
                    style="width: 300px; height: 300px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="d-flex justify-content-center">
                <p>{{ $post->caption }}</p>
            </div>
            <div class="d-flex justify-content-center gap-2 mt-0 mb-2 p-2">
                <button wire:click="unarsip({{ $post->id }})" class="btn" style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                       color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;">
                    Unarsip
                </button>
                <button type="button" class="btn"  style="background: linear-gradient(to right, rgba(255, 69, 58, 0.9), rgba(255, 69, 58, 0.7), rgba(255, 69, 58, 0.3)); 
                       color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#deleteModal"
                    wire:click="$set('postIdToDelete', {{ $post->id }})">
                    Hapus
                </button>
            </div>
            <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus postingan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" style="background: transparent; 
                            color: rgba(0, 0, 0, 0.712); 
                            border: 1px solid rgba(0, 0, 0, 0.712); 
                            padding: 10px 20px; 
                            border-radius: 8px; 
                            font-weight: bold; 
                            margin-right: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn"
                                style="background: linear-gradient(to right, rgba(68, 173, 159, 0.9), rgba(68, 173, 159, 0.7), rgba(68, 173, 159, 0.3)); 
                      color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: bold; margin-right:10px;"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                wire:click="$set('postIdToDelete', {{ $post->id }})">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada postingan yang diarsipkan.</p>
        @endforelse
    </div>

    <style>
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</div>
