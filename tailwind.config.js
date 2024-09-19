/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./views/pages/**/*.{php,js}",
      "./views//layouts/**/*.{php,js}",

  ],
  theme: {
    extend: {
        colors: {
            main: '#212121',
            accent: '#F1343E',
            hover: '#3F3F3F',

            // grenny: {
            //     100: '#A0A0A4',
            //     200: '#2C3034',
            //     300: '#212529',
            //     400: '#131518',
            //     500: '#0C0D0F',
            // },
        },
        screens: {
            'xs': '320px',
        },
        fontFamily: {
            inter: ["Inter", "sans-serif"],
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
    darkMode: "class"
}

// Tailwind start --- npx tailwindcss -i ./src/inc.css -o ./public/css/styles.css --watch

