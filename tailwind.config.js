const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class', // or 'media' or 'class'
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            stroke: {
                'black': '#000'
            },
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
