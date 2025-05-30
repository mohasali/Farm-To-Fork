import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Noto Sans','sans-serif'],
            },
            colors: {
                'text': '#295b43',
                'background': '#fffff',
                'primary': '#E57343',
                'secondary': '#295b43',
                'accent1': '#f88030',
                'accent2': '#347857',
                },
        },
    },
    plugins: [],
    darkMode: 'class',
};
