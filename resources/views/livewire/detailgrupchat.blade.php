<div>
    <div x-data="{ searchOpen: false, dateOpen: false }">
        <div id="header"
            class="position-fixed w-100 top-0 start-0 transition-all d-flex justify-content-between align-items-center p-4 bg-white"
            style="color:black; z-index: 1000;" @click.away="searchOpen = false; dateOpen = false">

            <div class="d-flex align-items-center position-relative w-100">

                <div class="mr-3 d-flex justify-content-center align-items-center">
                    <a href="{{ URL::previous() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icon-tabler-chevron-left">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 6l-6 6l6 6" />
                        </svg>
                    </a>
                </div>
                <div class="d-flex align-items-center mt-1 position-absolute"
                    style="margin-left: 35px; transition: opacity 0.3s ease-in-out;">

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                        x-show="!searchOpen && !dateOpen" x-cloak class="rounded-circle shadow-1-strong mr-2"
                        width="45">

                    <a href="{{ route('anggotagroup') }}">
                        <p class="mt-2" x-show="!searchOpen && !dateOpen" x-cloak>Komunitas BKK</p>
                    </a>
                </div>

                <div class="position-absolute w-100" style="transition: opacity 0.3s ease-in-out;">

                    <div class="input-group rounded" x-show="searchOpen" x-cloak x-transition>
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon">
                    </div>

                    <div class="input-group rounded" x-show="dateOpen" x-cloak x-transition>
                        <input type="date" class="form-control rounded">
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">

                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icon-tabler-search ml-2" style="margin-right:10px; cursor: pointer;"
                    x-show="!searchOpen && !dateOpen" x-cloak @click="searchOpen = true; dateOpen = false">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-filter" style=" pointer;"
                    x-show="!searchOpen && !dateOpen" x-cloak @click="dateOpen = true; searchOpen = false">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" />
                </svg>
            </div>
        </div>
    </div>

    <ul class="list-unstyled container pb-5" style="padding-top: 100px">
        <li class="d-flex justify-content-between mb-2">
            <div class="card w-100">
                <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Lara Croft</p>
                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium.
                    </p>
                </div>
            </div>
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong ml-2" width="50">
        </li>
        <li class="d-flex justify-content-between mb-2">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong mr-2" width="50">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Brad Pitt</p>
                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> 10 mins ago</p>
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </li>

        <li class="d-flex justify-content-between mb-2">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong mr-2" width="50"
                height="50">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Ikram Akbar</p>
                    <p class="text-muted small mb-0"><i class="far fa-clock"></i> 9 mins ago</p>
                </div>
                <div class="card-body">
                    <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </li>
    </ul>

    <form class="comment-form bg-white">
        <input type="text" placeholder="Tulis komentar..." />
        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
            </svg></button>
    </form>

    <style>
        a {
            color: inherit;
            text-decoration: none;
        }

        .comment-form {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            border-top: 1px solid #ddd;
            display: flex;
            align-items: center;
        }

        .comment-form input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            margin-right: 10px;
        }

        .comment-form button {
            background: #44AD9F;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

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
    </style>

</div>
