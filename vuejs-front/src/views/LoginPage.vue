<template>
  <div class="content">
    <div class="login-container">
      <div class="login-image">
        <img src="../assets/img/login-img.png" alt="Login Image" />
      </div>

      <div class="login-form">
        <h2>Log in to Exclusive</h2>
        <form @submit.prevent="handleLogin">
          <!-- Email field -->
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" id="email" v-model="formData.email" />
            <span v-if="errors.email" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.email }}
            </span>
          </div>

          <!-- Password field -->
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="formData.password" />
            <span v-if="errors.password" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.password }}
            </span>
          </div>

          <button type="submit">Login</button>
        </form>

        <div class="register-link">
          <p>
            Don't have an account?
            <router-link to="/register">Register here</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/auth";
import { reactive } from "vue";
import { useRouter } from "vue-router";
import Swal from "sweetalert2";
import Toast from "@/utils/toast";

const authStore = useAuthStore();
const router = useRouter();

const formData = reactive({
  email: "",
  password: "",
});

const errors = reactive({
  email: "",
  password: "",
});

const validateEmail = (email) => {
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
};

const validateForm = () => {
  let isValid = true;

  if (!formData.email.trim()) {
    errors.email = "Email is required";
    isValid = false;
  } else if (!validateEmail(formData.email)) {
    errors.email = "Invalid email format (@)";
    isValid = false;
  } else {
    errors.email = "";
  }

  if (!formData.password.trim()) {
    errors.password = "Password is required";
    isValid = false;
  } else {
    errors.password = "";
  }

  return isValid;
};

const handleLogin = async () => {
  if (validateForm()) {
    await authStore.authenticate("login", formData);
    if (!Object.keys(authStore.errors).length > 0) {
      Toast.fire({
        icon: "success",
        title: "Login Successful",
        text: "You will be redirected to the home page.",
        timer: 2000,
        showConfirmButton: false,
      }).then(() => {
        router.push("/home");
      });
    } else if (Object.keys(authStore.errors).length > 0) {
      Toast.fire({
        icon: "error",
        title: "Login Failed",
        text: Object.values(authStore.errors).flat().join(", "),
      });
    }
  } else {
    Toast.fire({
      icon: "warning",
      title: "Please fill in all required fields",
      text: "Check your form data again",
    });
  }
};
</script>

<style scoped>
.content {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0;
  height: 100vh;
}

.login-container {
  display: flex;
  width: 800px;
  background-color: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.login-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.login-image img {
  max-width: 100%;
  height: auto;
  border-radius: 5px 0 0 5px;
}

.login-form {
  flex: 1;
  padding: 40px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 12px;
  box-sizing: border-box;
  border-radius: 12px;
  border: 1px solid #ccc;
  font-size: 16px;
  background-color: #f9f9f9;
  color: #333;
  transition: border 0.3s ease, box-shadow 0.3s ease;
}

input:focus {
  border-color: #66afe9;
  box-shadow: 0 0 8px rgba(102, 175, 233, 0.6);
  outline: none;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #90ac7f;
  color: white;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #6d8b68ee;
}

.error-message {
  margin-top: 10px;
  color: rgb(173, 65, 65);
}

.register-link {
  margin-top: 15px;
  text-align: center;
}

.register-link a {
  color: #0066cc;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}

/* .content {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0;
}

.login-container {
  width: 350px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input {
  width: 100%;
  padding: 8px;
  box-sizing: border-box;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #90ac7f;
  color: white;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #6d8b68ee;
}

.error-message {
  margin-top: 10px;
  color: red;
}

.register-link {
  margin-top: 15px;
  text-align: center;
}

.register-link a {
  color: #0066cc;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
} */
</style>
