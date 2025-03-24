import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/boxesIndex.js','resources/js/glass.js','resources/js/boxesShow.js','resources/js/recipeGlass.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        https: false, // Ensure this is set to false to avoid using Herd's SSL certificate
      },
});
