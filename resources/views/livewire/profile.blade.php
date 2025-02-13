<div class="container h-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 p-0"
            style="background: linear-gradient(to bottom, #44AD9F, #2E7D74) !important; border-radius: 0 0 20px 20px;">


            <div class="text-center">
                <p class="mt-3  text-white" style="font-size:16px padding:5px 10px; border-radius:5px;">
                    {{ Str::title(Auth::user()->name) }}
                </p>
            </div>
            <div x-data="{ open: false }" class="position-absolute " style="top: 15px; right: 10px;">
                <!-- Tombol Hamburger -->
                <button @click="open = !open" class="border-0 bg-transparent text-white">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                        class="bi bi-list">
                        <path fill-rule="evenodd"
                            d="M3 12a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0-5a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm0 10a1 1 0 0 1 1-1h16a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1z" />
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                        class="bi bi-x">
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


            <div class=" text-white d-flex align-items-center p-4"
                style="background-color: #44AD9F; height: 170px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">

                <div class="ms-3 mt-3 d-flex flex-column align-items-center">
                    <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">

                </div>

                <div class="ms-3 mt-3">
                    <div class=" justify-content-end text-center text-white">
                        <div class="d-flex justify-content-end text-center py-1">

                            <div>
                                <p class="mb-1 h5" style="font-size:14px;">253</p>
                                <p class="small mb-0">Photos</p>
                            </div>
                            <div class="px-3">
                                <p class="mb-1 h5" style="font-size:14px;">1026</p>
                                <p class="small mb-0">Followers</p>
                            </div>
                            <div>
                                <p class="mb-1 h5" style="font-size:14px;">478</p>
                                <p class="small mb-0">Following</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 flex-grow-1"
                                style="max-width: 50px; height: 35px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-dark">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </div>
                            <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 text-center flex-grow-1"
                                style="max-width: 100px; height: 35px;">
                                <p class="mb-0 text-dark" style="font-size: 13px;">Messange</p>
                            </div>
                            <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 text-center flex-grow-1"
                                style="max-width: 100px; height: 35px;">
                                <p class="mb-0 text-dark" style="font-size: 13px;">Undang</p>
                            </div>
                        </div>


                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-4 text-black bg-white mt-3 "
            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <div class="d-flex justify-content-center gap-5 mb-4 position-relative">
                <!-- Grid Icon -->
                <div class="menu-item active" onclick="setActive(this)">
                    <i class="bi bi-grid-3x3-gap-fill fs-3 text-secondary"></i>
                </div>
                <!-- Video Icon -->
                <div class="menu-item" onclick="setActive(this)">
                    <i class="bi bi-camera-reels fw-semibold fs-3 text-secondary"></i>
                </div>
                <!-- Profile Icon -->
                <div class="menu-item" onclick="setActive(this)">
                    <i class="bi bi-person-square fs-3 text-secondary"></i>
                </div>
            </div>

            <div class="mt-3" style="padding-bottom: 30px">
                <div class="gallery">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" class="large">
                    <div class="small-images">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp">
                    </div>
                </div>
                <div class="gallery mt-2">
                    <div class="small-images">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp">
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" class="large">
                </div>

                <style>
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

            </div>

        </div>


    {{-- modals --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                            <span aria-hidden="true">&times;</span>
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


        <div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Upload Video</h5>
                            <span aria-hidden="true">&times;</span>
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



        <div class="container custom-navbar d-flex justify-content-between">
            <!-- Upload Foto -->
            <button class="nav-btn " style="padding-bottom: 10p" id="photoBtn" onclick="setActive('photo')"
                data-toggle="modal" data-target="#exampleModal">📷</button>


            <!-- Home -->
            <button class="nav-home active" id="homeBtn" onclick="setActive('home')"
                style="color: rgba(0, 0, 0, 0.789)">Unggah</button>

            <!-- Upload Video -->
            <button class="nav-btn" id="videoBtn" onclick="setActive('video')"   data-toggle="modal" data-target="#video">🎥</button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const buttons = document.querySelectorAll(".nav-btn, .nav-home");
                const navbar = document.querySelector(".custom-navbar");
                const activeIndicator = document.createElement("div");

                activeIndicator.classList.add("active-indicator");
                navbar.appendChild(activeIndicator);

                function updateIndicator(btn) {
                    const btnWidth = btn.offsetWidth;
                    const btnHeight = btn.offsetHeight;
                    const btnLeft = btn.offsetLeft;

                    activeIndicator.style.width = `${btnWidth}px`;
                    activeIndicator.style.height = `${btnHeight}px`;
                    activeIndicator.style.transform = `translateX(${btnLeft}px)`;
                }

                buttons.forEach((btn) => {
                    btn.addEventListener("click", () => {
                        updateIndicator(btn);
                    });
                });

                const homeBtn = document.querySelector(".nav-home.active");
                if (homeBtn) {
                    updateIndicator(homeBtn);
                }
            });
        </script>

        <style>
            .active-indicator {
                position: absolute;
                bottom: 20%;
                transform: translateY(50%);
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



            .gallery img {
                object-fit: cover;
                width: 100%;
                height: 100%;
                border-radius: 15px;
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
