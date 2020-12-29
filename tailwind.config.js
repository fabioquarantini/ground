module.exports = {
  purge: {
    enabled: false,
    content: ['./**/*.php', './js/**/*.js'],
    options: {
      safelist: [
        'aspect-w-16',
        'aspect-h-9',
        'aspect-w-4',
        'aspect-h-3'
      ],
    }
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    container: {
      center: true,
      padding: '1.5rem',
    },
    extend: {
      colors: {
        primary: '#C5AB78',
        secondary: '#549b93',
      },
      fontFamily: {
        primary: [
          'ui-sans-serif',
          'system-ui',
          '-apple-system',
          'BlinkMacSystemFont',
          '"Segoe UI"',
          'Roboto',
          '"Helvetica Neue"',
          'Arial',
          '"Noto Sans"',
          'sans-serif',
          '"Apple Color Emoji"',
          '"Segoe UI Emoji"',
          '"Segoe UI Symbol"',
          '"Noto Color Emoji"',
        ],
        secondary: ['ui-serif', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
      },
      keyframes: {
        'fade-in': {
          'from': { opacity: 0 },
          'to': { opacity: 1 },
        },
        'fade-in-up': {
          'from': { opacity: 0, transform: 'translate3d(0, 100%, 0)' },
          'to': {opacity: 1, transform: 'none' },
        },
        'fade-in-down': {
          'from': { opacity: 0, transform: 'translate3d(0, -100%, 0)' },
          'to': { opacity: 1, transform: 'none' },
        },
        'fade-out': {
          'from': { opacity: 1 },
          'to': { opacity: 0 },
        },
        'fade-out-up': {
          'from': { opacity: 1 },
          'to': { opacity: 0, transform: 'translate3d(0, -100%, 0)' },
        },
        'fade-out-down': {
          'from': { opacity: 1 },
          'to': { opacity: 0, transform: 'translate3d(0, 100%, 0)' },
        }
      },
       animation: {
        'fade-in': 'fade-in 1s ease-in-out',
        'fade-in-up': 'fade-in-up 1s ease-in-out',
        'fade-in-down': 'fade-in-down 1s ease-in-out',
        'fade-out': 'fade-out 1s ease-in-out',
        'fade-out-up': 'fade-out-up 1s ease-in-out',
        'fade-out-down': 'fade-out-down 1s ease-in-out',
       }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}