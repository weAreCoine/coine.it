const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
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
                darkBox: '#25344E'
            }
        },
    },
};
