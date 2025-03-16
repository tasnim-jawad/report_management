import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/backend/app.js",
                //fronend
                "resources/js/frontend/app.js",
                //backend
                "resources/js/backend/report_management/unit/main.js",
                "resources/js/backend/report_management/ward/main.js",
                "resources/js/backend/report_management/thana/main.js",
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
});
