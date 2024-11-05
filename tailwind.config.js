import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import daisyui from 'daisyui';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
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
                primary: '#0F1649',
                info: '#084D9C',
            },
        },
    },

    plugins: [forms, daisyui],
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#0F1649",
                    "info": "#084D9C",

                },
            },
            "light",
        ],
    },
};
