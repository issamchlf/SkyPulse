import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

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
                orbitron: ['Orbitron', 'sans-serif'],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'light-blue': '#F1F7F9',
                'blue-gray': '#749DC8',
                'bright-blue': '#0A61C9',
                'deep-blue': '#004089',
                'navy-blue': '#073264',
            },
            transitionProperty: {
                'colors': 'background-color, border-color, color',
            },
        },
    },

    plugins: [forms],
}
