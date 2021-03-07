module.exports = {
  purge: [
    './**/*.html',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        nforange: {
          light: 'rgb(255, 136, 110)',
          DEFAULT: 'rgb(255, 90, 54)',
        },
        nfblue: {
          light: 'rgb(69, 105, 151)',
          DEFAULT: 'rgb(25, 50, 81)',
        }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
