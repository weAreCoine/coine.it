const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        maxWidth: {
            '8xl': '90rem',
        },
        listStyleType: {
            square: 'square'
        },
        extend: {
            fontFamily: {
                'sans': ['"Source Sans 3"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkBox: '#25344E',
                // orange: {
                //     '50': '#fff2f1',
                //     '100': '#ffe1df',
                //     '200': '#ffc8c5',
                //     '300': '#ffa39d',
                //     '400': '#ff6d64',
                //     '500': '#ff2d20',
                //     '600': '#ed2215',
                //     '700': '#c8180d',
                //     '800': '#a5180f',
                //     '900': '#881b14',
                //     '950': '#4b0804',
                // },
            }
        },
    },
};
