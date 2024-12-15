import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/base.css",
                "resources/css/base-new.css",
                "resources/css/datatable.css",
                "resources/css/select.css",

                "resources/js/app.js",
                "resources/js/base.js",
                "resources/js/select-drop-down.js",
                "resources/js/theme-switch.js",
                "resources/js/header.js",
                "resources/js/language-setting.js",
                "resources/js/file-upload.js",
                "resources/js/role-permission.js",
                "resources/js/sidebar.js",
                "resources/js/table.js",
                "resources/js/custom-crud.js",
                "resources/js/tab.js",
                "resources/js/upload-image.js",
                "resources/js/multi-select-dropdown.js",
                "resources/js/search-select-drop-down.js",
                "resources/js/select.js",
            ],
            refresh: true,
        }),
    ],
    server: {
        host: "laraframe.test",
    },
});
