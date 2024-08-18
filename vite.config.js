import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/pet_owner_css/nav.css',
                'resources/css/pet_owner_css/dashboard.css',
                'resources/css/pet_owner_css/profile.css',
                'resources/css/pet_owner_css/bookinghistory.css',
                'resources/js/pet_owner_js/bookinghistory.js',
                'resources/js/pet_owner_js/upcoming.js',
                'resources/css/pet_owner_css/upcoming.css'
            ],
            refresh: true,
        }),
    ],
});
