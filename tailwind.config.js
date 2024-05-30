/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      backgroundColor: {
        'rental': 'rgb(19 78 74)',
        'rentallight': 'rgb(24 98 93)',
        'rentalgrey': 'rgb(95, 96, 98)',
        'table': 'rgba(0,0,0,.05)' // Replace with your custom color code
      },
      fontFamily: {
        'rental': ['Cairo', 'sans-serif'], // 
      },
    },
  },
  plugins: [
    
  ],
}

