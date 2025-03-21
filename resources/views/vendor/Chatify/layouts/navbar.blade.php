<div>
    <footer class="fixed-bottom py-2 d-flex justify-content-around border-top "
        style=" background-color: hsl(210, 17%, 93%); border-radius: 20px 20px 0 0;">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/chatterfly" class="{{ request()->is('chatterfly') ? 'text-custom' : 'text-secondary' }}"
                style="{{ request()->is('chatterfly') ? 'color: #44AD9F;' : '' }}">  
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                    class="icon icon-tabler icons-tabler-filled icon-tabler-message-chatbot">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005 -.2v-8a4 4 0 0 1 4 -4zm-2.8 9.286a1 1 0 0 0 -1.414 .014a2.5 2.5 0 0 1 -3.572 0a1 1 0 0 0 -1.428 1.4a4.5 4.5 0 0 0 6.428 0a1 1 0 0 0 -.014 -1.414m-5.69 -4.286h-.01a1 1 0 1 0 0 2h.01a1 1 0 0 0 0 -2m5 0h-.01a1 1 0 0 0 0 2h.01a1 1 0 0 0 0 -2" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Chat
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/profile" class="{{ request()->is('profile') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-article">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M19 3a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h14zm-2 12h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm0 -4h-10l-.117 .007a1 1 0 0 0 0 1.986l.117 .007h10l.117 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('profile') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Laman
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/group" class="{{ request()->is('group') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                </svg>

            </a>
            <h6 class="m-0 {{ request()->is('group') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Group
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/login-pin" class="{{ request()->is('private') ? 'text-success' : 'text-secondary' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24"
                    fill="currentColor">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l362.8 0c-5.4-9.4-8.6-20.3-8.6-32l0-128c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7l-91.4 0zM528 240c17.7 0 32 14.3 32 32l0 48-64 0 0-48c0-17.7 14.3-32 32-32zm-80 32l0 48c-17.7 0-32 14.3-32 32l0 128c0 17.7 14.3 32 32 32l160 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32l0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80z" />
                </svg>
            </a>
            <h6 class="m-0 {{ request()->is('private') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Privat
            </h6>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center">
            <a href="/bio" class="{{ request()->is('bio') ? 'text-success' : 'text-secondary' }}">
                <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                    class="user-avatar border border-white">
            </a>

            <style>
                .user-avatar {
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                    object-fit: cover;
                    transition: border-color 0.3s ease;
                } 

                .user-avatar:hover {
                    border-color: #44ad9f !important;
                    /* Hijau Bootstrap */
                }
            </style>

            <h6 class="mt-1 mb-0 {{ request()->is('page') ? 'fw-semibold' : 'fw-light' }}" style="font-size: 12px;">
                Bio
            </h6>
        </div>
    </footer>
</div>
