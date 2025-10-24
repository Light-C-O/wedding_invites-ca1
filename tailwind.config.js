
//This section has been commented out due to errors that led to background colour not showing

    // import defaultTheme from 'tailwindcss/defaultTheme';
    // import forms from '@tailwindcss/forms';

    // /** @type {import('tailwindcss').Config} */
    // export default {
    //     content: [
    //         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    //         './storage/framework/views/*.php',
    //         './resources/views/**/*.blade.php',
    //     ],

    //     theme: {
    //         extend: {
    //             fontFamily: {
    //                 sans: ['Figtree', ...defaultTheme.fontFamily.sans],
    //             },
    //         },
    //     },

    //     plugins: [forms],
    // };
    
//

import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // <-- Allows toggling dark mode with class

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php', // <-- Add this if using Jetstream
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',                    // <-- Add this to cover JS files
        './resources/**/*.vue',                      // <-- Add if using Vue
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
}