import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/home/Home.vue"; // Nhập khẩu Home.vue
import About from "../views/home/About.vue"; // Nhập khẩu About.vue
import Contact from "../views/home/Contact.vue"; // Nhập khẩu Contact.vue
import AuthComponent from "../views/home/AuthComponent.vue"; // Nhập khẩu và sử dụng component tương ứng

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home, // Sử dụng Home.vue
  },
  {
    path: "/about",
    name: "About",
    component: About, // Sử dụng About.vue
  },
  {
    path: "/contact",
    name: "Contact",
    component: Contact, // Sử dụng Contact.vue
  },
  {
    path: "/auth",
    name: "Auth",
    component: AuthComponent, // Nhập khẩu và sử dụng component tương ứng
  },
  // Các route khác nếu cần
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
