import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
import router from "./router";
import axiosInstance from "@/plugins/axiosInstance"; // Import axiosInstance

const app = createApp(App);

// Cấu hình Axios
app.config.globalProperties.$axios = axiosInstance; // Use axiosInstance globally

app.use(router);
app.mount("#app");
