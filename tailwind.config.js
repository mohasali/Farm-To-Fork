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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': '#C44D58',
                'background': '#F5DEB3',
                'primary': '#A7C957',
                'secondary': '#556B2F',
                'accent1': '#D35400',
                'accent2': '#FFD166',
            },
        },
    },
    plugins: [],
};
