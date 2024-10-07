<template></template>

<script>
import axios from "axios";

export default {
  name: "ProductsPage",
  data() {
    return {
      products: [],
    };
  },
  // created() {
  //   this.fetchProducts();
  // },
  methods: {
    async fetchProducts() {
      try {
        const response = await axios.get("http://localhost:8000/api/tests");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
  },
};
</script>

<style scoped></style>
