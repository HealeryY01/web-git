import axios from "axios";

const axiosInstance = axios.create({
  baseURL: "http://localhost/website/api", // Trỏ đến thư mục API trên server
  timeout: 5000,
  headers: {
    "Content-Type": "application/json",
  },
});

export default axiosInstance;
