/** @type {import('tailwindcss').Config} */

const Manrope =
    "https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap";
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "blue-main": "#0096FF",
                "dodger-blue-50": "#EDFCFF",
                "dodger-blue-100": "#D6F6FF",
                "dodger-blue-200": "#B5F2FF",
                "dodger-blue-300": "#83ECFF",
                "dodger-blue-400": "#48DFFF",
                "dodger-blue-500": "#1EC4FF",
                "dodger-blue-600": "#06A9FF",
                "dodger-blue-700": "#0096FF",
                "dodger-blue-800": "#0872C5",
                "dodger-blue-900": "#0E3A5D",
                "dodger-blue-950": "#0E3A5D",
                "neutral-01": "#FFFFFF",
                "neutral-02": "#F6F6F6",
                "neutral-03": "#EEEEEE",
                "neutral-04": "#E3E3E3",
                "neutral-05": "#C6C6C6",
                "neutral-06": "#A5A5A5",
                "neutral-07": "#7F7F7F",
                "neutral-08": "#6C6C6C",
                "neutral-09": "#4D4D4D",
                "neutral-10": "#1B1B1B",
            },
            fontFamily: {
                body: ["Poppins"],
                main: [Manrope],
            },
            dropShadow: {
                button: "0 4px 4px rgba(0, 0, 0, 0.40)",
                card: "0 4px 10px rgba(0, 0, 0, 0.25)",
            },
        },
    },
    plugins: [],
};
