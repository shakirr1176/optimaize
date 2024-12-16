/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                Poppins: ["Poppins"],
            },

            colors: {
                primary: "#FFB100",
                secondary: "#0E395F",
                success: "#37af84",
                info: "#47A3CC",
                warning: "#DBFF49",
                "black-100": "#39393a",
                "black-80": "#6B6B6C",
                "black-50": "#a0a0a0",
                "black-30": "#c4c0c0",
                "black-25": "#e0e0e0",
                "black-20": "#F9F7F7",
                "sky-bg": "#fafbff",

                "lara-primary": "#24292E",
                "lara-darkBlack": "#1C2126",
                "lara-gray-100": "#2F363D",
                "lara-whiteGray": "#343C44",
                "lara-gray-200": "#969BA0",
                "lara-gray-300": "#c4c4c4",
                "lara-gray-400": "#626679",
                "lara-gray": "#5E7084",
                "lara-blue": "#43AEDC",
                "lara-blue-deep": "#3e607f",
                "lara-filter-gray": "#323940",

                // light
                "light-body": "#f3f3f9",
                "light-table-row": "#f3f3f9",
                "light-gray-100": "#94a3b8",

                // optimaize
                danger: "#FF5454",
                "lara-green": "#43DC80",

                "optm-gray-200": "#F2F2F2",
                "dark-optm-gray-200": "#191D3C",

                "optm-gray-300": "#4A3F6E1A",
                "dark-optm-gray-300": "#4A3F6E66",

                'near-black-purple': '#31345E',
                dark_1: "#25284D",
                "branco-sujo": "#C3C3C3",

                dark_2: "#10122B",
                branco: "#191D3C",

                "optm-purple": "#A249FF",
                "optm-gray-100": "#DEDADA",
                "optm-deep-purple": "#835FEB",
                "optm-gray-50": "#25284D0D",
            },


            fontSize: {
                f10: "10px",
                f11: "11px",
                f13: "13px",
            },

            padding: {
                "18px": "18px",
            },

            width: {
                "120px": "120px",
                "250px": "250px",
                "300px": "300px",
            },

            borderRadius: {
                "radious-30": "30px",
                "radious-3": "3px",
                "lara-radious": "12px",
            },

            boxShadow: {
                "lara-input-shadow": "0px 0px 10px rgba(0, 0, 0, 0.05)",
                "lara-shadow2": "0px 0px 15px rgba(0, 0, 0, 0.15)",
                "lara-shadow3": "0px 0px 15px rgba(0, 0, 0, 0.1)",
                "lara-table-shadow": "0px 0px 10px rgba(0, 0, 0, 0.1)",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms")({
            strategy: "class",
        }),
        function ({ addUtilities }) {
            addUtilities({
                ".empty-hidden:empty": {
                    display: "none",
                },
            });
        },
    ],
};
