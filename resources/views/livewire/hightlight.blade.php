<div style="background-color: #CCFFE6;">
    <div class="">
        <div>
            <div class="no-scrollbar d-flex align-items-center" style="gap: 10px; overflow-x: auto; white-space: nowrap;">
                @if (Auth::id() === $selectedUserId)
                    <div class="d-flex position-absolute align-items-center justify-content-center custom-upload"
                        style="background-color:#44ad9fc5; height: 145px; width: 60px; border-radius: 0 60px 60px 0; cursor: pointer; overflow: hidden; flex-shrink: 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-photo-search text-white">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 8h.01" />
                            <path d="M11.5 21h-5.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" />
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M20.2 20.2l1.8 1.8" />
                            <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l2 2" />
                        </svg>
                        <input type="file" id="highlightUpload" wire:model.live="image" accept="image/*"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                    </div>
                    <div style="background-color: #44ad9fc5; width:66px;">
                    </div>
                @endif
                <div class="d-flex ml-3" style="gap: 1px; overflow-x: auto;">
                    @foreach ($highlights as $highlight)
                        <div class=" d-flex flex-column ; padding-left: 20px;"
                            style="flex-shrink: 0; width: 90px; cursor: pointer; margin-top: 10px; margin-bottom:10px;"
                            wire:click="edit({{ $highlight->id }})">

                            @if ($highlight->canView)
                                <img src="{{ asset('storage/' . $highlight->image) }}" alt="Sorotan"
                                    class="rounded-circle" style="height: 80px; width: 80px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/' . $highlight->image) }}" alt="Sorotan"
                                    class="rounded-circle"
                                    style="height: 80px; width: 80px; object-fit: cover; filter: blur(10px);">
                            @endif
                            <p class="mb-0 mt-1 text-center text-truncate" style="font-size:12px; max-width: 90px;">
                                {{ Str::limit($highlight->title, 8, '...') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($showEditModal && $selectedHighlight)
            <div x-data="{ open: true, editMode: false }" x-init="setTimeout(() => {
                open = false;
                window.location.reload();
            }, 5000)" x-show="open" class="modal fade show d-block"
                style="background: rgba(0, 0, 0, 0.9); width: 100vw; height: 100vh; display: flex; align-items: center; justify-content: center;"
                @click.away="open = false; window.location.reload();">

                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-body d-flex flex-column align-items-center p-0 position-relative"
                            style="width: 100vw; height: 100vh;">

                            {{-- Gambar Sorotan --}}
                            <img src="{{ asset('storage/' . $selectedHighlight->image) }}"
                                class="w-100 h-100 object-fit-contain">

                            {{-- Tombol Edit --}}
                            <button @click="editMode = true" class="btn btn-light position-absolute top-0 end-0 m-3">
                                ✏️ Edit
                            </button>

                            {{-- Modal Edit --}}
                            <div x-show="editMode"
                                class="position-absolute top-50 start-50 translate-middle bg-dark p-4 rounded"
                                style="width: 90%; max-width: 400px;">
                                <h5 class="text-white mb-3">Edit Sorotan</h5>

                                {{-- Form Edit (Livewire) --}}
                                <form wire:submit.prevent="updateHighlight">
                                    {{-- Upload Gambar --}}
                                    <input type="file" wire:model="newImage" class="form-control mb-3">

                                    {{-- Preview Gambar Baru --}}
                                    @if ($newImage)
                                        <img src="{{ $newImage->temporaryUrl() }}" class="w-100 mb-2 rounded">
                                    @endif

                                    {{-- Input Judul --}}
                                    <input type="text" wire:model="selectedHighlight.title" class="form-control mb-3"
                                        placeholder="Masukkan Judul">

                                    {{-- Tombol Simpan & Batal --}}
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary"
                                            @click="editMode = false">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="position-absolute bottom-0 start-0 w-100 mt-2">
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    style="width: 0%; animation: progressAnim 5s linear forwards;"></div>
                            </div>
                            <div class="container d-flex align-items-center mt-2">
                                <img src="{{ asset('storage/users-avatar/' . $selectedHighlight->user->avatar) }}"
                                    alt="Avatar" class="rounded-circle"
                                    style="width: 40px; height: 40px; object-fit: cover;">

                                <p class="mb-0 mt-1 text-center text-truncate fw-semibold text-white"
                                    style="font-size:20px; margin-left:10px;">
                                    {{ ucwords($selectedHighlight->title) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                @keyframes progressAnim {
                    from {
                        width: 0%;
                    }

                    to {
                        width: 100%;
                    }
                }

                .no-scrollbar::-webkit-scrollbar {
                    display: none;
                }

                .no-scrollbar {
                    scrollbar-width: none;
                    -ms-overflow-style: none;
                }
            </style>
        @endif

    </div>
</div>
