import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                indigo: {
                    100: "#d8dade",
                    200: "#b1b4bd",
                    300: "#8a8f9d",
                    400: "#63697c",
                    500: "#3c445b",
                    600: "#303649",
                    700: "#242937",
                    800: "#181b24",
                    900: "#0c0e12",
                },
                primary: {
                    100: "#fcd8df",
                    200: "#f8b1bf",
                    300: "#f58a9f",
                    400: "#f1637f",
                    500: "#ee3c5f",
                    600: "#be304c",
                    700: "#8f2439",
                    800: "#5f1826",
                    900: "#300c13",
                },
                grey: {
                    100: "#e3e3e3",
                    200: "#c7c7c7",
                    300: "#acacac",
                    400: "#909090",
                    500: "#747474",
                    600: "#5d5d5d",
                    700: "#464646",
                    800: "#2e2e2e",
                    900: "#171717",
                },
            },
        },
    },

    plugins: [forms],
};
