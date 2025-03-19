<div class="min-vh-100 bg-white">
    <div x-data="{ searchOpen: false }">
        <div id="header"
            class="position-fixed w-100 top-0 start-0 transition-all d-flex justify-content-between align-items-center p-3 bg-white"
            style="color:black">
            <div class="d-flex align-items-center position-relative" style="width: 100%;">
                <p class="d-flex align-items-center mt-3 position-absolute"
                    style="margin-left: 10px; transition: opacity 0.3s ease-in-out;" x-show="!searchOpen" x-cloak>
                    Grup Chat
                </p>
                <div class="input-group rounded position-absolute w-100" style="transition: opacity 0.3s ease-in-out;"
                    x-show="searchOpen" x-cloak x-transition>
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon">
                </div>
            </div>
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-search"
                    style="margin-right:10px; cursor: pointer;" @click="searchOpen = !searchOpen">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-filter" data-bs-toggle="modal"
                    data-bs-target="#modalsfiltering" x-show="!searchOpen" x-cloak x-transition>
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                </svg>
            </div>
        </div>
    </div>
    {{-- modals --}}
    <div class="modal fade" id="modalsfiltering" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 70px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size:18px">Pilih Tanggal</h5>
                </div>
                <div class="modal-body d-flex">
                    <input type="date" name="query"
                        class="form-control mt-2 ms-2 rounded btn btn-outline-dark bg-white"
                        style="padding: 10px 10px; font-size: 14px; margin-right: 5px; color: black; width: 500px;">
                    <button class="btn btn-outline-dark ms-2 mt-2 me-2" style="padding: 10px 10px;  font-size: 14px;"
                        type="submit">
                        Cari
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container min-vh-100 pb-5" style="padding-top:80px;">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                <div>
                    <div>
                        <ul class="list-unstyled mb-0">
                            <li class="p-2 border-bottom bg-body-tertiary">
                                <a href="{{ route('detailchatgroup') }}" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">John Doe</p>
                                            <p class="small text-muted">Hello, Are you there?</p>
                                        </div>
                                    </div>
                                    <div class="pt-1 text-center">
                                        <p class="small text-muted mb-1">Just now</p>
                                        <span class="badge bg-success float-end text-white">1</span>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Danny Smith</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1w">
                                        <p class="small text-muted mb-1">5 mins ago</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Alex Steward</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Ashley Olsen</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Kate Moss</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Lara Croft</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Lara Croft</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                            <li class="p-2 border-bottom">
                                <a href="#!" class="d-flex justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                            alt="avatar"
                                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                            width="60">
                                        <div class="pt-1 ml-2">
                                            <p class="fw-bold mb-0">Lara Croft</p>
                                            <p class="small text-muted">Lorem ipsum dolor sit.</p>
                                        </div>
                                    </div>
                                    <div class="pt-1">
                                        <p class="small text-muted mb-1">Yesterday</p>
                                    </div>
                                </a>
                            </li>
                        </ul>


                    </div>
                </div>

            </div>

        </div>

        <style>
            a {
                color: inherit;
                text-decoration: none;
            }

            /* style="width: 500px;" */


            [x-cloak] {
                display: none !important;
            }

            .translate-in {
                transform: translateX(0);
                opacity: 1;
            }

            .translate-out {
                transform: translateX(100%);
                opacity: 0;
            }

            .input-group {
                transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
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
            }
        </style>

    </div>
</div>
