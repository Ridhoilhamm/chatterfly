<nav class="navbar navbar-custom d-lg-none">

    <ul class="navbar-nav  w-100 ">
        <li class="nav-item flex-grow-1 ms-3">
            <a class="nav-link" href="/chatify" id="chatLink">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-message">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 9h8" />
                    <path d="M8 13h6" />
                    <path
                        d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                </svg>
                <p class="nav-text m-0 p-0">Chat</p>
            </a>
        </li>
        <li class="nav-item flex-grow-1">
            <a class="nav-link" href="/profile" id="pageLink">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 26 26" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                </svg>
                <p class="nav-text pt-1">Grup</p>
            </a>
        </li>
        <li class="nav-item flex-grow-1">
            <a class="nav-link" href="/pageuser" id="pageLink">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-lock">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                    <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                </svg>
                <p class="nav-text pt-1">Lock</p>
            </a>
        </li>
        <li class="nav-item flex-grow-1">
            <a class="nav-link" href="/pageuser" id="groupLink">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M16 19h6" />
                    <path d="M19 16v6" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                </svg>
                <p class="nav-text">Add</p>
            </a>
        </li>
    </ul>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;

        const links = [{
                path: '/chatify',
                id: 'chatLink'
            },
            {
                path: '/page',
                id: 'pageLink'
            },
            {
                path: '/group',
                id: 'groupLink'
            },
            {
                path: '/lock',
                id: 'lockLink'
            },
            {
                path: '/bio',
                id: 'bioLink'
            }
        ];

        links.forEach(link => {
            const element = document.getElementById(link.id);

            // Menghapus kelas active dari semua elemen
            element.classList.remove('active');

            // Menambahkan kelas active hanya pada elemen yang sesuai
            if (currentPath === link.path) {
                element.classList.add('active');
            }
        });
    });
</script>


{{-- DISABLE RIGHT CLICK  --}}

<script>
    var isNS = (navigator.appName == "Netscape") ? 1 : 0;

    if (navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN || Event.MOUSEUP);

    function mischandler() {
        return false;
    }

    function mousehandler(e) {
        var myevent = (isNS) ? e : event;
        var eventbutton = (isNS) ? myevent.which : myevent.button;
        if ((eventbutton == 2) || (eventbutton == 3)) return false;
    }
    document.oncontextmenu = mischandler;
    document.onmousedown = mousehandler;
    document.onmouseup = mousehandler;
</script>


<style>
    .navbar-nav {
        display: flex;
        justify-content: center;
        /* Pusatkan item */
        align-items: center;
        gap: 10px;
        /* Beri jarak antar item */
        width: 100%;
    }

    .nav-item {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
    }


    .nav-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #596170;
        text-decoration: none;
        font-size: 12px;
        transition: color 0.3s, transform 0.3s;
    }

    .nav-link i {
        font-size: 25px;
        margin-bottom: 4px;
        transition: transform 0.3s, color 0.3s;
    }

    .nav-link.active {
        color: #ffffff;
        transform: scale(1.1);
    }

    .nav-link.active i {
        color: #ffffff;
        font-size: 28px;
        transform: scale(1.2);
    }

    .nav-link.active .nav-text {
        color: #ffffff;
    }

    .nav-text {
        font-size: 10px;
        line-height: 1;
        margin: 0;
        transition: color 0.3s;
    }

    .navbar-custom {
        background-color: #eff2f6;
        padding: 10px 0;
        border-radius: 20px 20px 0 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.2);
        z-index: 10;
        display: flex;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .navbar-custom {
            display: none;
        }
    }
</style>
