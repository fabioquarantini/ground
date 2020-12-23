module.exports = {
  purge: {
    enabled: false,
    content: ['./**/*.php', './js/**/*.js'],
    options: {
      safelist: [
        'aspect-w-16',
        'aspect-h-16',
        'aspect-w-4',
        'aspect-h-3'
      ],
    }
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['sans-serif'],
      serif: ['serif'],
    },
    container: {
      center: true,
      padding: '1.5rem',
    },
    extend: {
      colors: {
        primary: '#C5AB78',
        secondary: '#549b93',
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