module.exports = {
  purge: {
    enabled: true,
    content: ['./**/*.php', './js/**/*.js'],
    // options: {
    //   safelist: ['bg-red-500', 'px-4'],
    // }
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
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}