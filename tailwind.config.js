const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'selector',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            '2xs': '390px',
            xs: '475px',
            ...defaultTheme.screens
        },
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
                darkBackground: colors.stone,
                accent: {
                    hover: '#ff6d64',
                    DEFAULT: '#ff2d20',
                    '50': '#fff2f1',
                    '100': '#ffe1df',
                    '200': '#ffc8c5',
                    '300': '#ffa39d',
                    '400': '#ff6d64',
                    '500': '#ff2d20',
                    '600': '#ed2215',
                    '700': '#c8180d',
                    '800': '#a5180f',
                    '900': '#881b14',
                    '950': '#4b0804',
                },
            }
        },
    },
};
