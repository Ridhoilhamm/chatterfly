import axios from 'axios';

import Alpine from 'alpinejs';
import Echo from "laravel-echo";

window.Alpine = Alpine;

Alpine.start();

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-app-key',
    cluster: 'your-pusher-app-cluster',
    encrypted: true
});
