import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path";

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
      "@assets": path.resolve(__dirname, "./src/assets"),
    },
    server: {
      proxy: {
        "/contact": {
          target: "http://localhost/website/api",
          changeOrigin: true,
        },
      },
    },
  },
});