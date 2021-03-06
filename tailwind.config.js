module.exports = {
  purge: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
        spacing: {
            '128': '32rem'
        },
        gridTemplateColumns: {
            'weather': '4fr 6fr 2fr'
        }
    },
  },
  variants: {
    extend: {
    },
  },
  plugins: [],
}
