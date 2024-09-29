<template>
  <div class="content">
    <div class="login-container">
      <div class="login-image">
        <img src="../assets/img/login-img.png" alt="Login Image" />
      </div>

      <div class="login-form">
        <h2>Log in</h2>
        <!-- <h6>Enter your details below</h6> -->
        <form @submit.prevent="handleLogin">
          <div class="form-group">
            <label for="username">Username or E-mail</label>
            <input type="text" id="username" v-model="username" required />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="password" required />
          </div>

          <button type="submit">Login</button>
        </form>

        <div v-if="errorMessage" class="error-message">
          {{ errorMessage }}
        </div>

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

<script>
export default {
  name: "Login",
  data() {
    return {
      username: "",
      password: "",
      errorMessage: "",
      email: "",
      password: "",
    };
  },
  methods: {
    handleLogin() {
      if (this.username === "admin" && this.password === "password123") {
        this.$emit("loginSuccess", "admin");
      } else if (this.username === "user" && this.password === "userpassword") {
        this.$emit("loginSuccess", "customer");
      } else {
        this.errorMessage = "Invalid username or password";
      }
    },
    async login() {
      try {
        const response = await axios.post("http://localhost:8000/api/login", {
          email: this.email,
          password: this.password,
        });

        // Save the token
        localStorage.setItem("token", response.data.token);

        // Redirect to a different page
        this.$router.push("/dashboard");
      } catch (error) {
        console.error(error);
        alert("Login failed.");
      }
    },
  },
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
