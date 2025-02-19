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

                <div class="d-flex justify-content-center ">

                    <p class="mt-0 text-white"
                        style="font-size:16px padding:5px 10px; border-radius:5px; padding-top:15px">
                        {{ Str::title(Auth::user()->name) }}
                    </p>

                    <div x-data="{ open: false }" class="position-absolute " style="top: 15px; right: 10px;">
                        <!-- Tombol Hamburger -->
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
                            <a href="#" class="d-block px-3 py-2 text-decoration-none text-black">Profile</a>
                            <a href="#" class="d-block px-3 py-2 text-decoration-none text-black">Settings</a>
                            <a href="" class="d-block px-3 py-2 text-decoration-none text-danger">Logout</a>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
                </div>

                <div class="d-flex justify-content-center p-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                            style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                    </div>

                    <div class="ms-3" style="margin-left:20px;">
                        <div class="justify-content-end text-center text-white">
                            <div class="d-flex justify-content-end text-center">
                                <div>
                                    <p class="mb-1 h5" style="font-size:14px;">{{(Auth::user()->postingan)}}</p>
                                    <p class="small mb-0">Postingan</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h5" style="font-size:14px;">{{Auth::user()->followers}}</p>
                                    <p class="small mb-0">Followers</p>
                                </div>
                                <div>
                                    <p class="mb-1 h5" style="font-size:14px;">{{Auth::user()->following}}</p>
                                    <p class="small mb-0">Following</p>
                                </div>
                            </div>

                            <div class="d-flex gap-2 justify-content-end flex-wrap mt-4">
                                <a href={{route('page')}}>
                                    <div class="rounded-pill d-flex align-items-center justify-content-center rounded p-2 text-center flex-grow-1 border border-success border-2"
                                        style="max-width: 250px; width: 200px; height: 40px; margin-right:5px; border-color: #44AD9F !important; ">
                                        <p class="mb-0 text-white" style="font-size: 13px;">Cari Teman</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            {{-- content  --}}
            <div class="card-body p-0 text-black bg-white mt-3"
                style="border-top-left-radius: 15px; border-top-right-radius: 15px; padding-bottom:50px;">


                <div class="d-flex justify-content-center position-relative mt-0 mb-0">
                    <div class="menu-item active" onclick="scrollToSection(0)">
                        <i class="bi bi-grid-3x3-gap-fill" style="font-size:20px"></i>
                    </div>
                    <div class="menu-item" onclick="scrollToSection(1)">
                        <i class="bi bi-camera-reels fs-5" style="font-size:20px"></i>
                    </div>
                    <div class="menu-item" onclick="scrollToSection(2)">
                        <i class="bi bi-person-square fs-3" style="font-size:20px"></i>
                    </div>
                </div>


                <!-- SCROLLABLE CONTENT -->
                <div class="content-container" onscroll="highlightActiveSection()" style="padding-bottom:40px;">
                    <div class="content-section">
                        <div class="gallery">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                class="large">
                            <div class="small-images">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(113).webp">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp">
                            </div>
                        </div>
                        <div class="gallery">
                            <div class="small-images mt-2">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(113).webp">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp">
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                class="large">
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="gallery">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(115).webp"
                                class="large">
                            <div class="small-images mt-2">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(116).webp">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(117).webp">
                            </div>
                        </div>
                        <div class="gallery mt-2">
                            <div class="small-images">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(113).webp">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp">
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                class="large">
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="gallery">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(118).webp"
                                class="large">
                            <div class="small-images">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(119).webp">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(120).webp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .content-container {}

                .menu-item {
                    cursor: pointer;
                    padding:50px;
                    padding-bottom:10px;
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
                    padding: 20px;
                }

                .gallery {
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


            <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Upload Video</h5>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Input File Video -->
                            <input type="file" id="videoInput" class="form-control" accept="video/*">

                            <!-- Preview Video -->
                            <video id="videoPreview" class="mt-3 d-none" width="100%" controls></video>
                        </div>
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
                        <div class="modal-body" x-data="{
                            videoUrl: null,
                            handleFile(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    this.videoUrl = URL.createObjectURL(file);
                                }
                            }
                        }">
                            <form id="videoUploadForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="videoInput" accept="video/*"
                                        @change="handleFile" required>
                                </div>
                                <div class="mb-3" x-show="videoUrl">
                                    <label class="form-label">Pratinjau Video</label>
                                    <video x-bind:src="videoUrl" class="w-100" controls></video>
                                </div>
                                <button type="submit" class="btn btn ms-auto">Upload</button>
                            </form>
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
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
            <script>
                function navbarHandler() {
                    return {
                        homeText: "Unggah",
                        activeIndex: 1, // Index tombol aktif
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
                                        target: this.buttons[1] // Kembali ke "home" setelah modal tertutup
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
                                // Swipe kiri -> pindah ke kanan
                                this.activeIndex = Math.min(this.activeIndex + 1, this.buttons.length - 1);
                            } else if (direction < -50) {
                                // Swipe kanan -> pindah ke kiri
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
                            }, 'home'); // Default ke tombol "home"
                        }
                    };
                }
            </script>



            <style>

                /* css  */
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
