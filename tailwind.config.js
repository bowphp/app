import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./templates/**/*.{blade,tintin}.php",
    "./templates/**/*.twig",
    "./templates/**/*.{js,jsx,ts,tsx,vue}",
    "./assets/js/**/*.{js,jsx,ts,tsx,vue}",
    "./var/views/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Figtree", ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [
    // require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
    // Add more plugins as needed
  ],
};
