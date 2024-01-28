import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
// import react from "@vitejs/plugin-react";

export default defineConfig({
    server: {
        host: "wpplagiarism.co.bd",
        // host: "api.wpplagiarism.co.bd",
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            valetTls: "wpplagiarism.co.bd",
            // valetTls: "api.wpplagiarism.co.bd",
        }),
        // react(),
    ],
});
