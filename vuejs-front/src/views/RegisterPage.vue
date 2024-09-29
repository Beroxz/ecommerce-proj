<template>
  <div class="content">
    <div class="register-container">
      <div class="register-image">
        <img src="../assets/img/regist.png" alt="Register Image" />
      </div>

      <div class="register-form">
        <h2>Register</h2>
        <h6>Enter your details to create an account</h6>
        <form @submit.prevent="handleRegister">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" v-model="name" required />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="email" required />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" v-model="password" required />
          </div>

          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input
              type="password"
              id="confirmPassword"
              v-model="confirmPassword"
              required
            />
          </div>

          <button type="submit">Register</button>
        </form>

        <div v-if="errorMessage" class="error-message">
          {{ errorMessage }}
        </div>

        <div class="login-link">
          <p>
            Already have an account?
            <router-link to="/login">Log in here</router-link>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      confirmPassword: "",
      errorMessage: "",
    };
  },
  methods: {
    async handleRegister() {
      if (this.password !== this.confirmPassword) {
        this.errorMessage = "Passwords do not match";
        return;
      }

      try {
        const response = await axios.post(
          "http://localhost:8000/api/register",
          {
            name: this.name,
            email: this.email,
            password: this.password,
          }
        );

        // Save the token
        localStorage.setItem("token", response.data.token);

        // Redirect to a different page after registration
        this.$router.push("/dashboard");
      } catch (error) {
        console.error(error);
        this.errorMessage = "Registration failed.";
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
