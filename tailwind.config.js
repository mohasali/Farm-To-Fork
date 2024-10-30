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
                'background': '#f7f7f7',
                'primary': '#E57343',
                'secondary': '#F4A261',
                'accent1': '#ed9121',
                'accent2': '#F2C94C',
                },
        },
    },
    plugins: [],
    darkMode: 'class',
};
