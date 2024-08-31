import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import Echo from 'laravel-echo';
 
import Pusher from 'pusher-js';
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});


/*
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.PUSHER_APP_KEY,
    cluster: import.meta.env.PUSHER_APP_CLUSTER,
    forceTLS: true,
    encrypted: true,
});




const userId = document.head.querySelector('meta[name="user-id"]').content;
const userType = document.head.querySelector('meta[name="user-type"]').content;

if (userType === 'petowner') {
    window.Echo.private(`pet-status.${userId}`)
        .listen('PetStatusUpdated', (e) => {
            console.log('Pet Status Updated:', e.task_name);
            alert('Your pet\'s status has been updated: ' + e.task_name);
        });
}
*/



/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';
