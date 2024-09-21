<template>
  <div>
    <Navbar />
    <RouterView />
    <Footer />
  </div>
</template>

<script setup>
import Footer from "./components/Footer.vue";
import Navbar from "./components/Navbar.vue";
import { RouterView } from "vue-router";
</script>

<style scoped></style>
