/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './public/*.html',  // This ensures Tailwind looks for classes in all HTML files in the public directory
    './src/**/*.{html,js}', // This includes any HTML or JS files in the src directory
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
