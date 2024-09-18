/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./views/pages/**/*.{php,js}",
      "./views//layouts/**/*.{php,js}",

  ],
  theme: {
    extend: {
        colors: {
            main: '#46B95C',
            mainHover: '#38CD55',
            grenny: {
                100: '#A0A0A4',
                200: '#2C3034',
                300: '#212529',
                400: '#131518',
                500: '#0C0D0F',
            },
            inputBackground: '#1F2124',
            inputText: 'rgba(245, 245, 245, 0.9)',
            stripeText: 'rgba(245, 245, 245, 0.8)',
            borderText: 'rgba(245, 245, 245, 0.6)',
            defText: '#898A8B',
            border: 'rgba(245, 245, 245, 0.2)',
            header: 'rgba(255,255,255,0.09)',
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

// Tailwind start --- npx tailwindcss -i ./src/input.css -o ./public/css/styles.css --watch

