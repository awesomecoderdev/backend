import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
    server: {
        host: "wpplagiarism.one",
        // host: "api.wpplagiarism.one",
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            valetTls: "wpplagiarism.one",
            // valetTls: "api.wpplagiarism.one",
        }),
        react(),
    ],
});
