import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/pages/landing.css',
                'resources/js/pages/landing.js'
            ],
            refresh: true,
        }),
    ],
    publicDir: false, // Disable Vite's public directory handling - Laravel handles public assets
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
