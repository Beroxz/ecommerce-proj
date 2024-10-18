<template>
  <div class="shop-page">
    <h1 v-if="!isLoading" class="shop-title">Shop</h1>
    <div class="product-list">
      <div v-for="product in products" :key="product.id" class="product-item">
        <img
          :src="
            product.image ? product.image : 'https://via.placeholder.com/150'
          "
          :alt="product.name"
          class="product-image"
        />
        <h2 class="product-name">{{ product.name }}</h2>
        <p class="product-description">{{ product.description }}</p>
        <p class="price">{{ product.price }} $</p>
        <!-- <button @click="addToCart(product)">Add to Cart</button> -->
        <div class="button-container">
          <button class="btn-details" @click="viewDetails(product)">
            <i class="fas fa-eye"></i>
          </button>
          <button class="btn-cart" @click="addToCart(product)">
            <i class="fas fa-shopping-cart"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ShopPage",
  data() {
    return {
      isLoading: true,
      products: [],
    };
  },
  created() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
      this.$emit("loading", true);
      try {
        const response = await axios.get("/api/tests");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error);
      } finally {
        this.$emit("loading", false);
        this.isLoading = false;
      }
    },
    addToCart(product) {
      alert(`Added ${product.name} to cart!`);
    },
  },
};
</script>

<style scoped>
.shop-page {
  padding: 20px;
  max-width: 1200px;
  margin: auto;
}

.shop-title {
  text-align: start;
  font-size: 36px;
  margin-top: 10px;
  margin-bottom: 30px;
  color: #333;
}

.product-list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  margin-bottom: 3rem;
}

.product-item {
  width: 250px;
  max-height: 400px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  text-align: center;
  background-color: #faf9f9;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s, box-shadow 0.2s;
}

.product-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.product-image {
  width: 100%;
  height: auto;
  border-radius: 8px;
  margin-bottom: 10px;
}

.product-name {
  font-size: 20px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.product-description {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

.price {
  font-size: 18px;
  color: #555;
  font-weight: bold;
  margin-bottom: 10px;
}

.btn-cart,
.btn-details {
  color: #333;
  border: none;
  padding: 5px 10px;
  border-radius: 50px;
  cursor: pointer;
  margin: 5px;
  background-color: transparent;
  font-size: 24px;
  /* background-color: #fff; */
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: background-color 0.2s; */
}

.btn-cart:hover,
.btn-details:hover {
  color: #6d8b68ee;
  /* color: #f0f0f0; */
  /* background-color: #6d8b68ee; */
}

/* button {
  background-color: #90ac7f;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #6d8b68ee;
} */
</style>
