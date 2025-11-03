import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        // Preserve arbitrary values and variants used in blades (production purge safety)
        { pattern: /opacity-\[[^\]]+\]/ },
        { pattern: /scale-\[[^\]]+\]/, variants: ['hover', 'group-hover'] },
        { pattern: /(hover|group-hover):shadow(.*)/ },
        { pattern: /(hover|group-hover):-?translate-y-0\.5/ },
        { pattern: /ring-(black|white)\/(5|10|20|40)/ },
        { pattern: /bg-gradient-to-(r|t|b)/ },
        { pattern: /(from|via|to)-(teal|cyan|emerald|sky)-\d{2,3}\/(10|12|15|20|40)/ },
        { pattern: /(from|via|to)-(white|black)\/(0|5|10|20|40|60)/ },
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
