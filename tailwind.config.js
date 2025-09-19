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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'alfan-green': {
                    light: '#8BC34A',
                    DEFAULT: '#4CAF50',
                    dark: '#2E7D32',
                },
                'alfan-orange': {
                    light: '#FFB74D',
                    DEFAULT: '#FF9800',
                    dark: '#F57C00',
                },
                'alfan-white': '#F8F9FA',
                'alfan-black': '#212121',

                'brand-olive': '#A4B743',
                'brand-sun': '#FEE275',
                'brand-gold': '#C79124',
                'brand-sky': '#499FB6',
                'brand-aqua': '#69AEB3',
                'brand-brown': '#6B4B34',
                
            },
                  screens: {
        'xxs': '320px',   // extra extra small
        'xms': '375px',   // extra mini small
        // you can add more custom breakpoints if needed
      },

        },
    },

    plugins: [forms],
};
