<template>
  <div class="not-found">
    <div class="not-found-content">
      <h1>404</h1>
      <h2>Oops! Page Not Found</h2>
      <p>Sorry, the page you are looking for does not exist.</p>
      <!-- <router-link to="/" class="btn-home">Go to Home</router-link> -->
    </div>
  </div>
</template>

<script>
export default {
  name: "NotFound",
};
</script>

<style scoped>
.not-found {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 60vh;
  color: #333;
  text-align: center;
}

.not-found h1 {
  font-size: 100px;
  font-weight: bold;
  margin: 0;
  color: #c54b55;
}

.not-found h2 {
  font-size: 24px;
  margin: 10px 0;
}

.not-found p {
  font-size: 18px;
  margin: 20px 0;
}

.btn-home {
  padding: 10px 20px;
  background-color: #90ac7f;
  color: white;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  font-size: 16px;
}

.btn-home:hover {
  background-color: #7a9b67;
}
</style>
