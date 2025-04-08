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
                'core-dark': '#3c4b64',
                'core-primary': '#3399ff',
                'core-success': '#2eb85c',
                'core-danger': '#e55353',
                'core-warning': '#f9b115',
                'core-info': '#63c2de',
            },
        },
    },
    plugins: [],
};
