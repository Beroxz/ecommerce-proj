<template>
  <div class="content">
    <div class="register-container">
      <div class="register-image">
        <img src="../assets/img/regist.png" alt="Register Image" />
      </div>

      <div class="register-form">
        <h2>Register a new account</h2>
        <h6>Enter your details to create an account</h6>

        <form @submit.prevent="handleRegister">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" v-model="formData.name" />
            <div v-if="errors.name" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.name }}
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" v-model="formData.email" />
            <div v-if="errors.email" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.email }}
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="formData.password" />
            <div v-if="errors.password" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.password }}
            </div>
          </div>

          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input
              type="password"
              id="password_confirmation"
              v-model="formData.password_confirmation"
            />
            <div v-if="errors.password_confirmation" class="error-message">
              <i class="fas fa-exclamation-circle"></i>
              {{ errors.password_confirmation }}
            </div>
          </div>

          <button type="submit">Register</button>
        </form>

        <div class="login-link">
          <p>
            Already have an account?
            <router-link to="/login">Login here</router-link>
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
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const errors = reactive({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const validateEmail = (email) => {
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
};

const validateForm = () => {
  let isValid = true;

  if (!formData.name.trim()) {
    errors.name = "Name is required";
    isValid = false;
  } else {
    errors.name = "";
  }

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
  } else if (formData.password.length < 6) {
    errors.password = "Password must be at least 6 characters";
    isValid = false;
  } else {
    errors.password = "";
  }

  if (formData.password_confirmation !== formData.password) {
    errors.password_confirmation = "Passwords do not match";
    isValid = false;
  } else {
    errors.password_confirmation = "";
  }

  return isValid;
};

const handleRegister = async () => {
  if (validateForm()) {
    try {
      await authStore.authenticate("register", formData);
      if (!Object.keys(authStore.errors).length > 0) {
        Toast.fire({
          icon: "success",
          title: "Registration Successful",
          text: "You will be redirected to the login page.",
          timer: 2000,
          showConfirmButton: false,
        }).then(() => {
          router.push("/login");
        });
      } else if (Object.keys(authStore.errors).length > 0) {
        Toast.fire({
          icon: "error",
          title: "Registration Failed",
          text: Object.values(authStore.errors).flat().join(", "),
          showConfirmButton: true,
        });
      }
    } catch (error) {
      console.log("Registration failed:", authStore.errors || error);
      Toast.fire({
        icon: "error",
        title: "Registration Failed",
        text: "Please try again.",
        showConfirmButton: true,
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

.register-container {
  display: flex;
  width: 800px;
  background-color: #f9f9f9;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.register-image {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.register-image img {
  max-width: 100%;
  height: auto;
  border-radius: 5px 0 0 5px;
}

.register-form {
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

.login-link {
  margin-top: 15px;
  text-align: center;
}

.login-link a {
  color: #0066cc;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}
</style>
