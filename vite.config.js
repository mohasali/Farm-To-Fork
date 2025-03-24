import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/boxesIndex.js','resources/js/glass.js','resources/js/boxesShow.js','resources/js/recipeGlass.js'],
            refresh: true,
        }),
    ]
});
