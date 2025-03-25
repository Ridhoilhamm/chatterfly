<div class="container h-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 p-0">
            <div
                style="
            border-bottom-right-radius: 15px; 
            border-bottom-left-radius: 15px; 
            height: 250px; 
            width: 100%; 
            background: linear-gradient(to top, rgba(0, 0, 0, 11.2),  rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.2)), 
                        url('https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(116).webp'); 
            background-size: cover;
            background-position: center;">
                <div class="d-flex justify-content-between align-items-center position-relative">
                    <div class="d-flex align-items-center">
                        <div class="container">
                            <a href="{{ url()->previous() }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"
                                    style="color: white">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M5 12l6 6" />
                                    <path d="M5 12l6 -6" />
                                </svg>
                            </a>
                        </div>
                        <p class="mt-0 text-white justify-content-center"
                            style="font-size:16px; padding: 5px 10px; border-radius: 5px; padding-top: 15px; padding-left:150px">
                            {{ Str::limit($user->name, 6, '.') }}
                        </p>
                    </div>

                    <div x-data="{ open: false }" class="position-absolute" style="top: 15px; right: 10px;">
                        <button @click="open = !open" class="border-0 bg-transparent text-white">
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="white" class="bi bi-list">
                                <path fill-rule="evenodd"
                                    d="M3 12a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0-5a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 10a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1z" />
                            </svg>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="white" class="bi bi-x">
                                <path fill-rule="evenodd"
                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L12 11.293l6.646-6.647a.5.5 0 1 1 .708.708L12.707 12l6.647 6.646a.5.5 0 0 1-.708.708L12 12.707l-6.646 6.647a.5.5 0 0 1-.708-.708L11.293 12 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="position-absolute bg-white text-black rounded shadow p-2"
                            style="right: 0; top: 40px; min-width: 150px; border: 1px solid white;">
                            <a href="/profile" class="d-block px-3 py-2 text-decoration-none text-black">Profile</a>
                            <a href="/bio" class="d-block px-3 py-2 text-decoration-none text-black">Settings</a>
                        </div>
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>

                <div class="d-flex justify-content-center p-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" alt="User Avatar"
                            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    </div>

                    <div class="ms-3 mt-0" style="margin-left:5px;">
                        <div class="justify-content-center text-center text-white">
                            <div class="d-flex justify-content-center text-center">
                                <div>
                                    <p class="mb-1 h5" style="font-size:14px;">{{ $user->postFotoCount()->count() }}</p>
                                    <p class="small mb-0">Postingan</p>
                                </div>
                                <a href="{{ route('pertemanan', $user->id) }}">
                                    <div class="px-3">
                                        @php
                                            $friendCount = \App\Models\Friendship::where('status', 'approved')
                                                ->where(function ($query) use ($user) {
                                                    $query
                                                        ->where('user_id', $user->id)
                                                        ->orWhere('friend_id', $user->id);
                                                })
                                                ->count();
                                        @endphp

                                        <p class="mb-1 h5" style="font-size:14px;">
                                            {{ $friendCount }}</p>
                                        <p class="small mb-0">Pertemanan</p>
                                    </div>
                                </a>
                                <div>
                                    <p class="mb-1 h5" style="font-size:14px;"> {{ $user->totalLikes()->count() }}</p>
                                    <p class="small mb-0">Disenangi</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 jflex-wrap mt-3">
                                <div>
                                    <livewire:friendships />
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>

            {{-- <livewire:hightlight /> --}}
            @livewire('hightlight', ['userId' => $user->id])

            <div class="card-body p-0 text-black bg-white"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px; padding-bottom:50px;">


                <div class="d-flex justify-content-center mb-0">
                    <div class="menu-item active" onclick="scrollToSection(0)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-layout-grid mt-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        </svg>
                    </div>
                    <div class="menu-item" onclick="scrollToSection(1)">
                        <i class="bi bi-camera-reels fs-5" style="font-size:20px"></i>
                    </div>
                    <div class="menu-item text-center" onclick="scrollToSection(2)">
                        <p class="d-flex justify-contet-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-user-square text-center">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 10a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path d="M6 21v-1a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v1" />
                                <path
                                    d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                            </svg>
                        </p>
                    </div>
                </div>



                <div class="content-container" onscroll="highlightActiveSection()" style="padding-bottom:40px;">



                    <style>
                        .gallery {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            gap: 10px;
                        }

                        .gallery-item {
                            overflow: hidden;
                            border-radius: 10px;
                        }

                        .gallery-item img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            border-radius: 10px;
                        }

                        .large {
                            grid-row: span 2;
                        }

                        .blurred img {
                            filter: blur(5px);
                        }
                    </style>
                    <div class="content-section">
                        <div class="gallery">
                            @foreach ($postFotos as $index => $foto)
                                <div
                                    class="gallery-item {{ $index % 3 == 0 ? 'large' : '' }} {{ $foto->isBlurred ? 'blurred' : '' }}">
                                    @if ($foto->isBlurred)
                                        <img src="{{ asset($foto->image_path) }}" alt="Foto">
                                    @else
                                        <a
                                            href="{{ route('detailpostingan', ['user' => $foto->user->id, 'post' => $foto->id]) }}">
                                            <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto"
                                                style="">
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="content-section d-flex flex-wrap justify-content-center">
                        @if ($postVideos->isEmpty())
                            <p class="text-center text-black w-100">Belum ada video yang diunggah.</p>
                        @else
                            @foreach ($postVideos as $video)
                                <div class="video-container">
                                    @if ($video->isBlurred)
                                        <video class="blurred-video" style="filter: blur(10px);">
                                            <source src="{{ asset('storage/' . $video->video_path) }}"
                                                type="video/mp4">
                                        </video>
                                    @else
                                        <a
                                            href="{{ route('detailvideo', ['user' => $video->user->id, 'post' => $video->id]) }}">
                                            <video controls>
                                                <source src="{{ asset('storage/' . $video->video_path) }}"
                                                    type="video/mp4">
                                            </video>
                                        </a>
                                    @endif
                                </div>
                            @endforeach

                        @endif
                    </div>

                    <div class="content-section">
                        <div class="gallery">
                            @foreach ($taggedPosts as $index => $post)
                                <div
                                    class="gallery-item {{ $index % 3 == 0 ? 'large' : '' }} {{ $post->isBlurred ? 'blurred' : '' }}">
                                    @if ($foto->isBlurred)
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Tag Foto">
                                    @else
                                        <a href="{{ route('post.detail', ['post' => $post->id]) }}">
                                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Tag Foto">
                                        </a>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <style> 
                .menu-item.active svg {
                    color: #44AD9F !important;
                }
                .blurred img {
                    filter: blur(10px);
                    transition: filter 0.3s ease-in-out;
                }
                .a {
                    text-decoration: none;
                }
                .menu-item {
                    cursor: pointer;
                    padding: 55px;
                    padding-top: 20px;
                    padding-bottom: 10px;
                    position: relative;
                }

                .menu-item.active::after {
                    content: "";
                    position: absolute;
                    bottom: -2px;
                    left: 50%;
                    width: 50%;
                    height: 3px;
                    background-color: #44AD9F;
                    transform: translateX(-50%);
                    border-radius: 3px;
                }
                .menu-item.active i {
                    color: #44AD9F !important;
                }

                .content-container {
                    display: flex;
                    overflow-x: auto;
                    scroll-snap-type: x mandatory;
                    -webkit-overflow-scrolling: touch;
                }

                .content-section {
                    min-width: 100%;
                    scroll-snap-align: start;
                    padding: 10px;
                }

                .gallery {

                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 10px;
                    height: 600px;

                }
                .gallery_b {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 10px;
                }

                .gallery img {
                    width: 100%;
                    border-radius: 15px;
                    object-fit: cover;
                }

                .large {
                    grid-row: span 2;
                    height: 100%;
                }

                .small-images {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                }

                .small-images img {
                    height: 50%;
                }

                a {
                    color: inherit;
                    text-decoration: none;
                }

                a:hover {
                    color: inherit;
                }

                .video-container {
                    width: calc(50% - 10px);
                    max-width: 187px;
                    aspect-ratio: 9 / 16;
                    margin: 5px;
                    display: flex;
                    justify-content: center;
                }

                .video-container video {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    border-radius: 10px;
                }

                @media (max-width: 600px) {
                    .video-container {
                        width: 100%;
                    }
                }
            </style>

            <script>
                function scrollToSection(index) {
                    const container = document.querySelector('.content-container');
                    const sections = document.querySelectorAll('.content-section');
                    container.scrollTo({
                        left: sections[index].offsetLeft,
                        behavior: "smooth"
                    });

                    updateActiveButton(index);
                }

                function highlightActiveSection() {
                    const container = document.querySelector('.content-container');
                    const sections = document.querySelectorAll('.content-section');
                    let currentIndex = 0;

                    sections.forEach((section, index) => {
                        if (container.scrollLeft >= section.offsetLeft - section.offsetWidth / 2) {
                            currentIndex = index;
                        }
                    });

                    updateActiveButton(currentIndex);
                }

                function updateActiveButton(index) {
                    document.querySelectorAll('.menu-item').forEach((item, i) => {
                        item.classList.toggle('active', i === index);
                    });
                }
            </script>



            {{-- modals --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" id="videoInput" class="form-control" accept="video/*">

                            <video id="videoPreview" class="mt-3 d-none" width="100%" controls></video>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modals foto --}}
            <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Upload Video</h5>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" id="videoInput" class="form-control" accept="video/*">
                            <video id="videoPreview" class="mt-3 d-none" width="100%" controls></video>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="saveVideo">Save to Gallery</button>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .active-indicator {
                    position: absolute;
                    bottom: 20px;
                    left: 0;
                    width: 50px;
                    height: 50px;
                    background: #44AD9F;
                    border-radius: 30px;
                    transition: transform 0.3s ease, width 0.3s ease;
                    z-index: -1;
                }

                .nav-btn {
                    position: relative;
                    top: -5px;
                }

                .custom-navbar {
                    position: fixed;
                    bottom: 60px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: #44ad9f9c;
                    border-radius: 30px;
                    padding: 10px;
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    width: 60%;
                    max-width: 350px;
                }

                .nav-btn {
                    width: 50px;
                    height: 50px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    background: transparent;
                    color: white;
                    font-size: 24px;
                    border: none;
                }

                .nav-btn:hover {
                    color: black;
                }

                .nav-home {
                    background: transparent;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    font-weight: bold;
                    border-radius: 20px;
                }
            </style>

        </div>
    </div>
