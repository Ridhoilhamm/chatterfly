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


                <div id="header" class="position-fixed w-100 top-0 start-0 p-2">
                    <p wire:click="togglePrivacy" class="mt-2" ">
                         @if ($isPrivate)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock mt-1">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-lock-open-2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                            <path d="M9 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M13 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                        @endif
                    </p>

                    <p class="m-0 text-center"
                        style="font-size:16px; padding:5px 10px; border-radius:5px; position: absolute; left:50%; top:50%; transform: translate(-50%, -50%);">
                        {{ Str::title(Auth::user()->name) }}
                    </p>

                    <div data-bs-toggle="modal" data-bs-target="#notifikasi"
                        class="position-absolute d-flex align-items-center gap-2"
                        style="top:50%; right:5px; transform: translateY(-60%); cursor: pointer;">

                        <p class="mb-0 mt-2"> {{ $pendingRequests->count() }}</p>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </div>

                </div>
                {{-- modals notifikasi --}}
                <div class="d-flex justify-content-center" style="padding-top: 100px;">
                    <div class="d-flex justify-content-center align-items-center mr-5">
                        <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    </div>

                    <div class="ms-3" style="margin-left:20px;" style="margin-top:100px;">
                        <div class="justify-content-end  text-white">
                            <div class="d-flex justify-content-center text-center">
                                <div>
                                    <p class="mb-1 h5" style="font-size:14px;">{{ $postCount }}</p>
                                    <p class="small mb-0">Postingan</p>
                                </div>
                                <a href="{{ route('pertemanan', $user->id) }}">
                                    <div class="px-4">
                                        @php
                                            $friendCount = \App\Models\Friendship::where('status', 'approved')
                                                ->where(function ($query) use ($user) {
                                                    $query
                                                        ->where('user_id', $user->id)
                                                        ->orWhere('friend_id', $user->id);
                                                })
                                                ->count();
                                        @endphp
                                        <p class="mb-1 h5" style="font-size:14px;">{{ $friendCount }}
                                        </p>
                                        <p class="small mb-0">Pertemanan</p>
                                    </div>
                                </a>
                                <a href="{{ route('like', $user->id) }}">
                                    <div>
                                        <p class="mb-1 h5" style="font-size:14px;">
                                            {{ Auth::user()->following()->count() }}
                                        </p>
                                        <p class="small mb-0 me-1">Disenangi</p>
                                    </div>
                                </a>
                            </div>

                            <div class="d-flex gap-2 justify-content-end flex-wrap mt-4">
                                <a href={{ route('page') }}>
                                    <div class="d-flex align-items-center justify-content-center p-2 text-center flex-grow-1 border border-success"
                                        style="max-width: 250px; width: 220px; height: 40px; margin-right:5px; border-color: #44AD9F !important; border-radius: 15px;">
                                        <p class="mb-0 text-white" style="font-size: 13px;">Cari Teman</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <livewire:hightlight />

            <div class="modal fade" id="notifikasi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <p class="fw-semibold" style="font-size:16px;">Daftar Permintaan</p>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <livewire:daftarfriendships />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0 text-black bg-white"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px; padding-bottom:50px;">
            <div class="d-flex justify-content-center mt-2 mb-0">
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
                            <path d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                        </svg>
                    </p>
                </div>
            </div>


            {{-- content --}}
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
                            <div class="gallery-item {{ $index % 3 == 0 ? 'large' : '' }} {{ $foto->isBlurred ? 'blurred' : '' }}">
                                @if ($foto->isBlurred)
                                    <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto">
                                @else
                                    <a href="{{ route('detailpostinganpribadi', ['user' => $foto->user->id, 'post' => $foto->id]) }}">
                                        <img src="{{ asset('storage/' . $foto->image_path) }}" alt="Foto">
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
                                <a href="{{ route('post.detail', ['post' => $post->id]) }}">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Tag Foto" >
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var header = document.getElementById("header");
                window.addEventListener("scroll", function() {
                    if (window.scrollY > 50) { // atur threshold sesuai kebutuhan
                        header.classList.add("scrolled");
                    } else {
                        header.classList.remove("scrolled");
                    }
                });
            });
        </script>
        <style>
            #header {
                background: transparent;
                color: white;
                transition: background 0.3s, color 0.3s;
                z-index: 1000;
            }

            #header.scrolled {
                background: white;
                color: black;
            }

            #header svg {
                transition: color 0.3s;
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            .menu-item {
                cursor: pointer;
                padding: 50px;
                padding-bottom: 15px;
                padding-top: 10px;
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

            .menu-item.active i, {
                color: #44AD9F !important;
            }

            .active-indicator {
                position: absolute;
                bottom: 5px;
                left: 0;
                width: 50px;
                height: 50px;
                background: #44AD9F;
                border-radius: 30px;
                transition: transform 0.3s ease, width 0.3s ease;
                z-index: -1;
            }

            .nav-btn {
                top: -5px;
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <livewire:uploadfoto />
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('closeModal', () => {
                    $('#exampleModal').modal('hide');
                });
            });
        </script>




        <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Upload Video</h5>
                        </button>
                    </div>
                    @livewire('upload-video')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveVideo">Save to Gallery</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Foto</h5>
                    </div>
                    <div class="modal-body" x-data="{
                        imageUrl: null,
                        handleFile(event) {
                            const file = event.target.files[0];
                            if (file && file.type.startsWith('image/')) {
                                this.imageUrl = URL.createObjectURL(file);
                            } else {
                                alert('Hanya file gambar yang diperbolehkan!');
                                event.target.value = ''; // Reset input
                                this.imageUrl = null;
                            }
                        }
                    }">
                        <form id="imageUploadForm" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Pilih Foto</label>
                                <input type="file" class="form-control" id="imageInput" accept="image/*"
                                    @change="handleFile" required>
                            </div>
                            <div class="mb-3" x-show="imageUrl">
                                <label class="form-label">Pratinjau Foto</label>
                                <img :src="imageUrl" class="img-fluid rounded" alt="Preview">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Video</h5>
                    </div>
                    <div class="modal-body">
                        <livewire:uploadVideo />
                    </div>
                </div>
            </div>
        </div>


        <div x-data="navbarHandler()" class="container custom-navbar d-flex justify-content-between"
            x-on:touchstart="startSwipe($event)" x-on:touchmove="moveSwipe($event)" x-on:touchend="endSwipe()">
            <button class="nav-btn" id="photoBtn" x-on:mouseenter="setActive($event, 'photo')"
                x-on:touchstart="setActive($event, 'photo')" data-modal="#exampleModal">
                📷
            </button>
            <button class="nav-home active" id="homeBtn" x-text="homeText"
                x-on:mouseenter="setActive($event, 'home')" x-on:touchstart="setActive($event, 'home')">
                Unggah
            </button>
            <button class="nav-btn" id="videoBtn" x-on:mouseenter="setActive($event, 'video')"
                x-on:touchstart="setActive($event, 'video')" data-modal="#videoModal">
                🎥
            </button>

            <div class="active-indicator" x-ref="indicator"></div>
        </div>
        <script>
            function navbarHandler() {
                return {
                    homeText: "Unggah",
                    activeIndex: 1,
                    buttons: [],
                    startX: 0,
                    endX: 0,

                    setActive(event, type) {
                        let btn = event.target;
                        this.activeIndex = this.buttons.indexOf(btn);
                        this.updateIndicator(btn);
                        this.homeText = type === 'home' ? "Unggah" : "";
                        let modalId = btn.getAttribute("data-modal");
                        if (modalId) {
                            this.showModal(modalId);
                        }
                    },

                    updateIndicator(btn) {
                        this.$nextTick(() => {
                            let indicator = this.$refs.indicator;
                            indicator.style.width = `${btn.offsetWidth}px`;
                            indicator.style.height = `${btn.offsetHeight}px`;
                            indicator.style.transform = `translateX(${btn.offsetLeft}px) translateY(10px)`;
                        });
                    },

                    showModal(modalId) {
                        let modal = document.querySelector(modalId);
                        if (modal) {
                            $(modal).modal("show");
                            $(modal).on("hidden.bs.modal", () => {
                                this.setActive({
                                    target: this.buttons[1]
                                }, 'home');
                            });
                        }
                    },

                    startSwipe(event) {
                        this.startX = event.touches[0].clientX;
                    },

                    moveSwipe(event) {
                        this.endX = event.touches[0].clientX;
                    },

                    endSwipe() {
                        let direction = this.startX - this.endX;
                        if (direction > 50) {
                            this.activeIndex = Math.min(this.activeIndex + 1, this.buttons.length - 1);
                        } else if (direction < -50) {
                            this.activeIndex = Math.max(this.activeIndex - 1, 0);
                        }
                        this.setActive({
                            target: this.buttons[this.activeIndex]
                        }, this.buttons[this.activeIndex].id);
                    },

                    init() {
                        this.buttons = Array.from(document.querySelectorAll('.nav-btn, .nav-home'));
                        this.setActive({
                            target: this.buttons[1]
                        }, 'home');
                    }
                };
            }
        </script>

    </div>
</div>
</div>
