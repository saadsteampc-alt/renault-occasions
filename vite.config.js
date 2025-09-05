import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/theme.css',
                'resources/css/loading.css',
                'resources/css/transitions.css',
                'resources/css/back-to-top.css',
                'resources/css/forms.css',
                'resources/css/cards.css',
                'resources/css/utilities.css',
                'resources/css/buttons.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
