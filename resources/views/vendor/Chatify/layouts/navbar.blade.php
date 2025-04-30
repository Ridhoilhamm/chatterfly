<style>
    .footer-container {
        position: fixed;
        bottom: 0;
        width: 100%;
        padding: 0.5rem 0;
        display: flex;
        justify-content: space-around;
        border-top: 1px solid #D1D5DB;
        background-color: #F3F4F6;
        border-radius: 20px 20px 0 0;
        z-index: 50;
        font-family: 'Ubuntu', sans-serif;
    }


    .footer-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .footer-icon {
        width: 24px;
        height: 24px;
        fill: currentColor;
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid white;
        transition: border-color 0.3s ease;
    }

    .user-avatar:hover {
        border-color: #44AD9F;
    }

    .text-active {
        color: #16a34a;
        /* green-600 */
        font-weight: 600;
    }

    .text-inactive {
        color: #6b7280;
        /* gray-500 */
        font-weight: 300;
    }

    .text-teal {
        color: #14b8a6;
        /* teal-600 */
        font-weight: 600;
    }
</style>

<div>
    <footer class="footer-container">
        <!-- Chat -->
        <div class="footer-item">
            <a href="/chatterfly" class="{{ request()->is('chatterfly') ? 'text-teal' : 'text-inactive' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="footer-icon" viewBox="0 0 24 24">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743v-2h-1a4 4 0 0 1 -4 -4v-8a4 4 0 0 1 4 -4z" />
                </svg>
            </a>
            <span>Chat</span>
        </div>

        <!-- Laman -->
        <div class="footer-item">
            <a href="/profile" class="{{ request()->is('profile') ? 'text-active' : 'text-inactive' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="footer-icon" viewBox="0 0 24 24">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M19 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h14zm-2 12h-10a1 1 0 0 0 0 2h10a1 1 0 0 0 0 -2zm0 -4h-10a1 1 0 0 0 0 2h10a1 1 0 0 0 0 -2zm0 -4h-10a1 1 0 0 0 0 2h10a1 1 0 0 0 0 -2z" />
                </svg>
            </a>
            <span class="{{ request()->is('profile') ? 'text-active' : 'text-inactive' }}">Laman</span>
        </div>

        <!-- Group -->
        <div class="footer-item">
            <a href="/group" class="{{ request()->is('') ? 'text-active' : 'text-inactive' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="footer-icon" viewBox="0 0 24 24">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 2a5 5 0 1 1 -5 5a5 5 0 0 1 5 -5z" />
                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
                </svg>
            </a>
            <span class="{{ request()->is('group') ? 'text-active' : 'text-inactive' }}">Group</span>
        </div>
        <div class="footer-item">
            <a href="/login-pin" class="{{ request()->is('private') ? 'text-active' : 'text-inactive' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="footer-icon" viewBox="0 0 640 512">
                    <path
                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h362.8c-5.4-9.4-8.6-20.3-8.6-32v-128c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7H178.3zM528 240c17.7 0 32 14.3 32 32v48h-64v-48c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32v128c0 17.7 14.3 32 32 32h160c17.7 0 32-14.3 32-32v-128c0-17.7-14.3-32-32-32v-48c0-44.2-35.8-80-80-80s-80 35.8-80 80z" />
                </svg>
            </a>
            <span class="{{ request()->is('private') ? 'text-active' : 'text-inactive' }}">Privat</span>
        </div>
        <div class="footer-item">
            <a href="/bio" class="{{ request()->is('bio') ? 'text-active' : 'text-inactive' }}">
                <img src="{{ asset('storage/users-avatar/' . Auth::user()->avatar) }}" alt="User Avatar"
                    class="user-avatar" />
            </a>
            <span class="{{ request()->is('bio') ? 'text-active' : 'text-inactive' }}"
                style="margin-top: 4px;">Bio</span>
        </div>
    </footer>
</div>
