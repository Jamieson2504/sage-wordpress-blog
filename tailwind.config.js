/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    fontFamily: {
      'title': ['BebasNeue-Regular', 'sans-serif'],
      'alt': ['Danfo', 'serif'],
      'body': ["DM Sans", "sans-serif"],
    },
    extend: {
      colors: {
        'eggshell': '#FFFFF9',
        'black': '#010400',
        'darkblue': '#020887',
        'lighblue': '#72d3d1',

      }, // Extend Tailwind's default colors
    },
  },
  plugins: [],
};

export default config;
