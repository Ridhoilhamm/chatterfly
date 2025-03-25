<div>
    <div class="shadow-sm rounded-4 overflow-hidden mx-auto">
        <div id="header"
            class="position-fixed w-100 top-0 start-0 transition-all d-flex justify-content-between align-items-center p-3"
            style="color:white">
            <div class="d-flex align-items-center">
                <a href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                </a>

                <p class="d-flex align-items-center mt-3" style="margin-left:10px;">
                    Cari Teman
                </p>
            </div>

            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-search"
                    style="margin-right:10px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-filter" data-bs-toggle="modal"
                    data-bs-target="#modalsfiltering">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                </svg>
            </div>
        </div>
        {{-- modals --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            window.livewire.on('closeModal', () => {
                const modalEl = document.getElementById('exampleModal');
                let modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (!modalInstance) {
                    modalInstance = new bootstrap.Modal(modalEl);
                }
                modalInstance.hide();
            });

            // Setelah modal tersembunyi, hapus backdrop
            document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function() {
                document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
            });
        </script>


        {{-- modals filtering --}}
        <div class="modal fade" id="modalsfiltering" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 70px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size:18px">Filtering User</h5>
                    </div>
                    <div class="modal-body d-flex">
                        <input type="text" name="query"
                            class="form-control mt-2 ms-2 rounded btn btn-outline-dark  bg-white"
                            style="padding: 10px 10px; font-size: 14px; margin-right:5px; color:black;"
                            placeholder="Cari Bersadarkan Usia" value="{{ request()->query('query') }}">
                        <button class="btn btn-outline-dark ms-2 mt-2 me-2"
                            style="padding: 10px 10px;  font-size: 14px;" type="submit">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filteredUsers() {
            return this.users.filter(user => user.name.toLowerCase().includes(this.search.toLowerCase()));
        }
    </script>


    <section class="splide" wire:ignore>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                        class="splide__image " />
                </li>
                <li class="splide__slide">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                        class="splide__image " />
                </li>
                <li class="splide__slide">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                        class="splide__image" />
                </li>
            </ul>
        </div>
    </section>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
    @endpush

    <section class="px-3 bg-white" style=" padding-bottom:20px; margin-bottom:10px">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mt-3 mb-0" style="font-size: 16px;">Selebritis</h5>
            <a href="{{ route('selebritis') }}" class="mt-4 mb-1" style="color: #44AD9F;">Semua</a>
        </div>


        <div style="overflow-x: auto; white-space: nowrap; position: relative;">
            <div style="display: inline-flex; min-width: 100%; width: fit-content;">

                @foreach ($users as $user)
                    @php
                        $friendCount = \App\Models\Friendship::where('status', 'approved')
                            ->where(function ($query) use ($user) {
                                $query->where('user_id', $user->id)->orWhere('friend_id', $user->id);
                            })
                            ->count();
                    @endphp
                    <a href="{{ route('detailpengguna', $user->id) }}"">
                        <div style="flex-shrink: 0; width: 160px; margin-right: 10px; position: relative;">
                            <div class="d-block"
                                style="
         border-radius: 10px;
         height: 120px;
         width: 100%;
         background: 
    linear-gradient(to top, rgba(68, 173, 159, 0.908), rgba(68, 173, 159, 0.726), rgba(68, 173, 159, 0.141)) bottom,
    url('{{ asset('storage/users-avatar/' . $user->avatar) }}');
background-size: 100% 60%, cover;
background-position: bottom, center;
background-repeat: no-repeat;
     ">

                            </div>

                            <div class="">

                                <div
                                    style="position: absolute; bottom: 1px; left: 5px; 
                                             color: white; padding: 3px 6px; 
                                              font-size: 12px; border-radius: 4px;">
                                    <span style="display: block;">{{ Str::limit($user->name, 6, '...') }}</span>
                                    <span style="display: block; height: 25px; line-height: 25px;" class="mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            viewBox="0 0 24 24" fill="currentColor"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-user ">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                            <path
                                                d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                                        </svg>

                                        <span class="py-1">{{ $friendCount }}</span>
                                    </span>
                                </div>


                                <button class="btn btn-primary rounded"
                                    style="background:white; border: none; color:black ; font-size: 18px; padding: 2px; 
           position: absolute; top: 79px; left: 85%; transform: translateX(-60%);
           border-radius: 4px; width: 30px; height: 30px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"
                                        style="color:#44AD9F">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mt-3 mb-0" style="font-size: 16px;">Mungkin Anda Kenal</h5>
            <a href="{{ route('mungkinAndaKenal') }}" class="mt-4 mb-1" style="color: #44AD9F;">Semua</a>
        </div>

        <div style="overflow-x: auto; white-space: nowrap; position: relative; justify-content-center">
            <div style="display: inline-flex; min-width: 100%; width: fit-content;">
                @foreach ($users as $user)
                    @php
                        $friendCount = \App\Models\Friendship::where('status', 'approved')
                            ->where(function ($query) use ($user) {
                                $query->where('user_id', $user->id)->orWhere('friend_id', $user->id);
                            })
                            ->count();
                    @endphp
                    <a href="{{ route('detailpengguna', $user->id) }}">
                        <div
                            style="flex-shrink: 0; width: 90px; margin-right: 10px; position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                            <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" alt="avatar user"
                                class="rounded-circle d-block"
                                style="height: 90px; width: 90px; border: none; box-shadow: none; object-fit: cover; border-radius: 50%; ">
                            <p class="mb-0 mt-1" style="font-size:12px"> {{ Str::limit($user->name, 6, '...') }}</p>
                            <div class="d-flex justify-content-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="currentColor"
                                    class="icon icon-tabler icons-tabler-filled icon-tabler-user ">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                                    <path
                                        d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                                </svg>
                                <span class="text-black">{{ $friendCount }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </section>
    <div class="container bg-white">
        <p class=" mb-2" style="padding-top: 10px; font-size:16px;">Cari Teman</p>

        <div class="justify-content-center row row-cols-2 gx-1 ">
            @if ($users->count())
                @foreach ($users as $user)
                    @php
                        $friendCount = \App\Models\Friendship::where('status', 'approved')
                            ->where(function ($query) use ($user) {
                                $query->where('user_id', $user->id)->orWhere('friend_id', $user->id);
                            })
                            ->count();
                    @endphp
                    <a href="{{ route('detailpengguna', $user->id) }}">
                        <div class="col d-flex mb-2">
                            <div class="card shadow-sm"
                                style="width: 185px; min-height: 190px; border-radius: 15px; overflow: hidden;">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}"
                                        alt="{{ $user->name }}" class="w-100"
                                        style="height: 170px; object-fit: cover;">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title text-truncate text-black"
                                        style="font-size: 14px; min-height: 20px;">
                                        {{ $user->name }}
                                    </h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="m-0 d-flex align-items-center"
                                            style="height: 30px; line-height: 30px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 2a5 5 0 1 1 -5 5l.005-.217a5 5 0 0 1 4.995-4.783z" />
                                                <path
                                                    d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2v-1a5 5 0 0 1 5-5h4z" />
                                            </svg>
                                            <span>{{ $friendCount }}</span>
                                        </p>
                                        <button type="button"
                                            class="btn d-flex justify content-center align-items-center"
                                            style="height: 30px; font-size: 12px; padding: 0; line-height: 30px; background-color: #44AD9F; color: white;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                <path d="M16 19h6" />
                                                <path d="M19 16v6" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p>Tidak ada user yang ditemukan.</p>
            @endif

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
            background: transparent;
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
            /* Ubah warna ikon & button jadi hitam */
        }

        .splide {
            z-index: 1 !important;
        }

        .splide__slide {}

        .splide__image {
            width: 100%;
            height: 350px;

        }

        .splide__pagination {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 2;
            margin: 0;
            padding: 0;
        }

        .splide_pagination_page {
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.504);
            transition: background 0.3s ease, transform 0.3s ease;
            width: 6px;
            height: 6px;
        }

        .splide_pagination_page.is-active {
            background: #c7980b8c;
            width: 8px;
            height: 8px;
        }

        .splide__track--draggable {
            border-bottom-right-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .Splide @media (max-width: 600px) {
            .splide_pagination_page {
                width: 6px;
                height: 6px;
            }
        }



        .fixed-card {
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .user-avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        .user-name {
            max-width: 100px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .custom-margin {
            margin-bottom: 15px;
            margin-left: 10px;
        }

        @media (max-width: 576px) {
            .user-card {
                flex: 0 0 23%;
                max-width: 23%;
                margin-left: 5px;
            }
        }

        @media (min-width: 577px) {
            .user-card {
                flex: 0 0 23%;
                max-width: 23%;
            }
        }

        .a {
            text-decoration: none;
        }


        .col {
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</div>
