import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                redPrimary: '#bc0000',
                redSecondary: '#980101',
                redThird: '#DB0000',
                bluePrimary: '#0F1649',
                blueSecondary: '#000730',
                blueThird: '#084D9C',
            },
        },
    },

    plugins: [forms],
};
