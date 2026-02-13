import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/pages/landing/index.css', // Estilos de la landing page
                'resources/css/pages/products/index.css', // Estilos de la products page
                'resources/js/pages/landing/index.js' // Scripts de la landing page
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
