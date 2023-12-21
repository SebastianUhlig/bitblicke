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
                primary: colors.lime,
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

