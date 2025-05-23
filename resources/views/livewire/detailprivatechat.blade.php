<div>
    <div id="header"
        class="position-fixed w-100 top-0 start-0 transition-all d-flex justify-content-between align-items-center p-2 bg-white"
        style="color:black">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ URL::previous() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                </a>
            </div>

            <div class="d-flex align-items-center mt-3" style="margin-left:10px;">
                <a href="/detailprivate">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong ml-2" width="45">
                </a>
                <p class="d-flex align-items-center mt-2 ml-2">
                    Lara Croft
                </p>
            </div>
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

    <ul class="list-unstyled container" style="padding-top: 100px; padding-bottom:45px">
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
        <li class="d-flex justify-content-between mb-4">
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
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong mr-2" width="50">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Brand Pitt</p>
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
        <li class="d-flex justify-content-between mb-2">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                class="rounded-circle d-flex align-self-start me-3 shadow-1-strong mr-2" width="50">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-3">
                    <p class="fw-bold mb-0">Brand Pitt</p>
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
        [x-cloak] {
                display: none !important;
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
