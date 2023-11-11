const colors = require('tailwindcss/colors')

export default {
    content: [
        './app/View/Components/**/*.php',
        './app/Filament/**/*.php',
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            transitionProperty: {
                'inputLabel': 'top, left, padding, font-size'
            },
            colors: {
                gray: colors.slate,
                zinc: colors.slate,
                danger: colors.rose,
                primary: {
                    '50': '#ffffff',
                    '100': '#ffd9d7',
                    '200': '#ffb3af',
                    '300': '#ff8d86',
                    '400': '#ff675e',
                    '500': '#ff4136',
                    '600': '#cc342b',
                    '700': '#992720',
                    '800': '#661a16',
                    '900': '#330d0b',
                    '950': '#000000',
                },
                yellow: colors.yellow,
                black: colors.black,
                white: colors.white,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },

    plugins: [
        require('tailwindcss-dotted-background'),
    ],
}

