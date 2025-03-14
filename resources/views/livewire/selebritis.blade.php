<div>
    <div id="header"
        class="position-fixed w-100 top-0 start-0 transition-all d-flex justify-content-between align-items-center p-3"
        style="color:black">
        <div class="d-flex align-items-center">
            <a href="/page">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 6l-6 6l6 6" />
                </svg>
            </a>
            <p class="d-flex align-items-center mt-3" style="margin-left:10px;">
                Selebritis
            </p>
        </div>
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-search"
                style="margin-right:10px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#cariteman">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-filter" data-bs-toggle="modal"
                data-bs-target="#filtering">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
            </svg>
        </div>
    </div>

    <div class="row d-flex justify-content-center bg-white" style="margin-top:95px; vh-100;">
        @foreach ($users as $user)
            @php
                $friendCount = \App\Models\Friendship::where('status', 'approved')
                    ->where(function ($query) use ($user) {
                        $query->where('user_id', $user->id)->orWhere('friend_id', $user->id);
                    })
                    ->count();
            @endphp
            <a href="{{ route('detailpengguna', $user->id) }}">
                <div class="px-2">
                    <div style="flex-shrink: 0; width: 90px; display: flex; justify-content: center; align-items: center; flex-direction: column;"
                        class="mt-2 mr-2">
                        <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" alt="avatar user"
                            class="rounded-circle d-block"
                            style="height: 90px; width: 90px; border: none; box-shadow: none; object-fit: cover; border-radius: 50%;">
                        <p class="mb-0 mt-1" style="font-size:12px"> {{ Str::limit($user->name, 6, '...') }}</p>
                        <div class="d-flex justify-content-center mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user ">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                            </svg>
                            <span class="text-black">{{ $friendCount }}</span>
                        </div>
                    </div>
                </div>

            </a>
        @endforeach
            {{-- modals cari --}}
            <div class="modal fade" id="cariteman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 100px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cari User</h5>
                        </div>
                        <div class="modal-body d-flex">
                            <input type="text" wire:model.debounce.300ms="query"
                                class="form-control mt-2 ms-2 rounded btn btn-outline-dark bg-white"
                                style="padding: 10px 10px; font-size: 14px; margin-right:5px; color:black"
                                placeholder="Cari User">
                            <button type="button" data-bs-dismiss="modal" wire:click="searchUser"
                                class="btn btn-outline-dark ms-2 mt-2 me-2" style="padding: 10px 10px; font-size: 14px;">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- modals filtering --}}
            <div class="modal fade" id="filtering" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 100px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cari User</h5>
                        </div>
                        <div class="modal-body d-flex">
                            <input type="text" wire:model.debounce.300ms="query"
                                class="form-control mt-2 ms-2 rounded btn btn-outline-dark bg-white"
                                style="padding: 10px 10px; font-size: 14px; margin-right:5px; color:black"
                                placeholder="Cari User">
                            <button type="button" data-bs-dismiss="modal" wire:click="searchUser"
                                class="btn btn-outline-dark ms-2 mt-2 me-2" style="padding: 10px 10px; font-size: 14px;">
                                Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        <script>
            window.addEventListener("scroll", function() {
                const header = document.getElementById("header");
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        </script>
        <style>
            a {
                color: inherit;
                text-decoration: none;
            }

            #header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 9999 !important;
                background: white;
                transition: background 0.3s ease-in-out;
            }

            #header.scrolled {
                background: white;
                backdrop-filter: blur(10px);
            }
            #header .icon,
            #header P,
            #header svg,
            #header button {
                transition: color 0.3s ease-in-out;
            }

            #header.scrolled .icon,
            #header.scrolled P,
            #header.scrolled svg,
            #header.scrolled button {
                color: black !important;
            }
        </style>
    </div>

</div>
