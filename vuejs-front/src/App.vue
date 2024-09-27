<template>
  <div id="app">
    <Loading :isLoading="isLoading" />
    <Navbar />
    <RouterView @loading="setLoading" />
    <Footer />
  </div>
</template>

<script setup>
import Footer from "./components/Footer.vue";
import Navbar from "./components/Navbar.vue";
import Loading from "./views/Loading.vue";
import { RouterView } from "vue-router";
import { ref } from "vue";

const isLoading = ref(false);

const setLoading = (value) => {
  isLoading.value = value;
};
</script>

<style scoped>
html,
body {
  height: 100%;
  margin: 0;
}

#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

footer {
  margin-top: auto;
}
</style>
