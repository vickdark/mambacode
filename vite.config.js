import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/landing/index.js',
            ],
            refresh: true,
        }),
    ],
    publicDir: false, // Disable Vite's public directory handling - Laravel handles public assets
    build: {
        minify: 'esbuild',
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                manualChunks: undefined,
            },
        },
    },
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
