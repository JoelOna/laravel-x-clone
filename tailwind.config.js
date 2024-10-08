import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
            screens: {
              'sm': '576px',
              // => @media (min-width: 576px) { ... }
        
              'md': '960px',
              // => @media (min-width: 960px) { ... }
        
              'lg': '1480px',
              // => @media (min-width: 1440px) { ... }
            },
    },

    plugins: [forms,require('flowbite/plugin')],
    darkMode: 'class',
};
