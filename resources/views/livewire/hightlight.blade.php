<div style="background-color: #CCFFE6;">
    <div class="" style="   ">

        <div>
            <div class="d-flex align-items-center" style="gap: 10px; overflow-x: auto; white-space: nowrap;">

                @if (Auth::id() === $selectedUserId)
                    <div class="d-flex align-items-center justify-content-center"
                        style="background-color:#44ad9fc5; height: 130px; width: 60px; border-radius: 0 60px 60px 0; cursor: pointer; overflow: hidden; flex-shrink: 0;">
                        <i class="bi bi-images fs-6 text-white"></i>
                        <input type="file" id="highlightUpload" wire:model="image" accept="image/*"
                            style="opacity: 0; position: absolute; cursor: pointer;">
                    </div>
                @endif


                <div class="d-flex" style="gap: 10px; overflow-x: auto;">
                    @foreach ($highlights as $highlight)
                        <div class="position-relative d-flex flex-column align-items-center"
                            style="flex-shrink: 0; width: 90px; cursor: pointer; margin-top: 10px; margin-left:10px; margin-bottom:10px;"
                            wire:click="edit({{ $highlight->id }})">

                            @if ($highlight->canView)
                                <img src="{{ asset('storage/' . $highlight->image) }}" alt="Sorotan"
                                    class="rounded-circle" style="height: 90px; width: 90px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/' . $highlight->image) }}" alt="Sorotan"
                                    class="rounded-circle"
                                    style="height: 90px; width: 90px; object-fit: cover; filter: blur(10px);">
                            @endif

                            <p class="mb-0 mt-1 text-center text-truncate" style="font-size:12px; max-width: 90px;">
                                {{ Str::limit($highlight->title, 6, '...') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if ($showEditModal && $selectedHighlight)
    <div x-data="{ open: true }"
        x-init="setTimeout(() => { open = false; window.location.reload(); }, 5000)"
        x-show="open"
        class="modal fade show d-block"
        style="background: rgba(0, 0, 0, 0.9); width: 100vw; height: 100vh; display: flex; align-items: center; justify-content: center;"
        @click.away="open = false; window.location.reload();">

        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body d-flex flex-column align-items-center p-0 position-relative"
                    style="width: 100vw; height: 100vh;">
                    <img src="{{ asset('storage/' . $selectedHighlight->image) }}"
                        class="w-100 h-100 object-fit-contain">
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

                        <p class="mb-0 mt-1 text-center text-truncate fw-semibold"
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
            from { width: 0%; }
            to { width: 100%; }
        }
    </style>
@endif










    </div>
</div>
