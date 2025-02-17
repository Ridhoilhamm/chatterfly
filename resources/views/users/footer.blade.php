<div>


    <footer class="fixed-bottom bg-white py-2 d-flex justify-content-around border-top">
        <!-- Menu Utama -->
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/user" class="{{ request()->is('user') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                    class="icon icon-tabler icons-tabler-filled icon-tabler-home">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12.707 2.293l9 9c.63 .63 .184 1.707 -.707 1.707h-1v6a3 3 0 0 1 -3 3h-1v-7a3 3 0 0 0 -2.824 -2.995l-.176 -.005h-2a3 3 0 0 0 -3 3v7h-1a3 3 0 0 1 -3 -3v-6h-1c-.89 0 -1.337 -1.077 -.707 -1.707l9 -9a1 1 0 0 1 1.414 0m.293 11.707a1 1 0 0 1 1 1v7h-4v-7a1 1 0 0 1 .883 -.993l.117 -.007z" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('user') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Utama
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/artikel" class="{{ request()->is('artikel') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('artikel') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Cari
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/kategory" class="{{ request()->is('kategory') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-message-circle">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M3 20l1.3 -3.9c-2.324 -3.437 -1.426 -7.872 2.1 -10.374c3.526 -2.501 8.59 -2.296 11.845 .48c3.255 2.777 3.695 7.266 1.029 10.501c-2.666 3.235 -7.615 4.215 -11.574 2.293l-4.7 1" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('kategory') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Chat
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/data-diri" class="{{ request()->is('data-diri') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('data-diri') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Profil
            </h6>
        </div>
    </footer>
</div>
