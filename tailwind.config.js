module.exports = {
    purge: {
        enabled: false,
        content: ['./views/**/*.html'],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                'primary': '#474747',
                'gradientFirst': '#948E99',
                'gradientSecond': '#485563'
            },
            fonts: {
                'sans': ['Open-Sans', 'sans-serif'],
            },
            screens: {
                'sm': {'min': '300px', 'max': '529px'},
                'md': {'min': '530px', 'max': '719px'},
                'lg': {'min': '720px', 'max': '919px'},
                'xl': {'min': '920px', 'max': '100vw'},
            },
            keyframes: {
                'fadeIn': {
                    'from': {opacity: 0},
                    'to': {opacity: 1}
                },
                'fadeOut': {
                    'from': {opacity: 1},
                    'to': {opacity: 0}
                }
            },
            animation: {
                'fadeIn': 'fadeIn 1s ease-in-out forwards',
                'fadeOut': 'fadeOut 1s ease-in-out forwards'
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
