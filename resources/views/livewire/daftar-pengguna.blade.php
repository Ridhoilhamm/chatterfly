<div class="container h-100">
    <div class="row d-flex justify-content-center">
        <div class="col-12 p-0"
            style="background: linear-gradient(to bottom, #x 50%, #2E7D74 100%) !important; 
           border-radius: 0 0 20px 20px;">
            <div class="d-flex justify-content-between align-items-center p-3">
                <a href="/pageuser">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left text-white">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </div>
                </a>
                <div class="text-center">
                    <p class="mt-2 text-white" style="font-size:16px; padding:5px 10px; border-radius:5px;">
                        {{ Str::title($user->name) }}
                    </p>
                </div>

                <div x-data="{ open: false }" class="position-relative">
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
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>


            <div class=" text-white d-flex align-items-center p-5"
                style="background-color: #44AD9F; height: 170px; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">

                <div class="mt-3 d-flex flex-column align-items-center" style="margin-right:10px;">
                    <img src="{{ asset('storage/users-avatar/' . $user->avatar) }}" alt="Profile"
                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                </div>
                <div class="ms-4 mt-3">
                    <div class=" justify-content-end text-center text-white">
                        <div class="ms-2 d-flex justify-content-end text-center py-1">

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
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 flex-grow-1 rounded"
                                style="max-width: 50px; height: 35px; margin-right:2px">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="text-dark">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </div>
                            <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 text-center flex-grow-1 rounded"
                                style="max-width: 100px; height: 35px; margin-right:2px">
                                <p class="mb-0 text-dark" style="font-size: 13px;">Message</p>
                            </div>
                            <a href="/pageuser">

                                <div class="bg-white rounded-pill d-flex align-items-center justify-content-center p-1 text-center flex-grow-1 rounded"
                                    style="max-width: 100px; height: 35px;">
                                    <p class="mb-0 text-dark" style="font-size: 13px;">Undang</p>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>


        {{-- content  --}}
        <div class="card-body p-2 text-black bg-white mt-3"
            style="border-top-left-radius: 15px; border-top-right-radius: 15px; padding-bottom:50px;">

            <!-- NAVIGATION BUTTONS -->
            <div class="d-flex justify-content-center gap-5 mb-2 position-relative">
                <div class="menu-item active" onclick="scrollToSection(0)">
                    <i class="bi bi-grid-3x3-gap-fill fs-3"></i>
                </div>
                <div class="menu-item" onclick="scrollToSection(1)">
                    <i class="bi bi-camera-reels fw-semibold fs-3"></i>
                </div>
                <div class="menu-item" onclick="scrollToSection(2)">
                    <i class="bi bi-person-square fs-3"></i>
                </div>
            </div>

            <!-- SCROLLABLE CONTENT -->
            <div class="content-container" onscroll="highlightActiveSection()">
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
            .content-container {
                max-height: 400px;
                overflow-y: auto;
                scroll-behavior: smooth;
            }

            .menu-item {
                cursor: pointer;
                padding: 10px;
                position: relative;
            }

            .menu-item.active::after {
                content: "";
                position: absolute;
                bottom: -2px;
                left: 50%;
                width: 50%;
                height: 3px;
                background-color: #007bff;
                transform: translateX(-50%);
                border-radius: 3px;
            }

            .menu-item.active i {
                color: #007bff !important;
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
