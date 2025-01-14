 import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/voyage.css',
                'resources/css/dashboard.css',
                'resources/css/profil.css',
                'resources/css/connexion.css',
                'resources/css/like.css',
                'resources/css/aPropos.css',
                'resources/css/contact.css',
                'resources/css/qui.css',
                'resources/css/error.css'
            ],
            refresh: true,
        }),
    ],
});
