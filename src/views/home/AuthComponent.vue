<template>
  <div class="min-h-screen bg-gray-100 py-6 flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
      <h1 class="text-2xl font-bold text-gray-900 mb-6">Đăng Nhập</h1>
      <form @submit.prevent="handleSubmit">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            v-model="email"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700"
            >Mật khẩu</label
          >
          <input
            type="password"
            v-model="password"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          />
        </div>
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
          Đăng Nhập
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthComponent",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async handleSubmit() {
      try {
        // Gửi yêu cầu đăng nhập đến backend
        const response = await this.$axios.post(
          "http://localhost:5000/api/auth/login",
          {
            email: this.email,
            password: this.password,
          }
        );
        if (response.data.success) {
          alert("Đăng nhập thành công!");
          // Chuyển hướng hoặc thực hiện hành động khác
        } else {
          alert("Có lỗi xảy ra: " + response.data.message);
        }
      } catch (error) {
        console.error("Lỗi khi đăng nhập:", error);
        alert("Có lỗi xảy ra khi đăng nhập. Vui lòng thử lại sau.");
      }
    },
  },
};
</script>

<style scoped>
/* Thêm các kiểu CSS tùy chỉnh nếu cần */
</style>
