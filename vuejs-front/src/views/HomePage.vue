<template>
  <div class="home-page">
    <!-- Hero Section -->
    <!-- <section class="hero">
      <div class="hero-content">
        <h1>Welcome to Greenery World</h1>
        <p>Your one-stop shop for all types of plants</p>
        <button class="shop-now-btn">Shop Now</button>
      </div>
    </section> -->

    <section class="hero">
      <div class="hero-content">
        <h1>Grow green, Get rooted</h1>
        <p>
          Cultivate happiness, one plant at a time. Shop our collection and
          discover the joy of nature, indoors & out.
        </p>
        <button class="shop-now-btn">Shop Now</button>
      </div>
      <div class="hero-section">
        <img
          src="@/assets/hero-image.png"
          alt="Hero image"
          class="hero-image"
        />
      </div>
    </section>

    <!-- Product Section -->
    <section class="product-section">
      <h2>New Arrivals</h2>
      <div class="product-grid">
        <div
          class="product-card"
          v-for="product in newProducts"
          :key="product.id"
        >
          <img :src="product.image" :alt="product.name" />
          <h3>{{ product.name }}</h3>
          <p>{{ product.description }}</p>
          <div class="price-cart-container">
            <span class="price">{{ product.price }}</span>
            <button @click="addToCart(product)" class="cart-btn">
              <i class="fas fa-shopping-cart"></i>
            </button>
          </div>
        </div>
      </div>

      <h2>Categories</h2>
      <div class="category-grid">
        <div
          class="category-card"
          v-for="category in categories"
          :key="category.id"
        >
          <img :src="category.image" :alt="category.name" />
          <h3>{{ category.name }}</h3>
        </div>
      </div>
    </section>

    <!-- <section class="product-section">
      <div class="container">
        <div class="product-cards">
          <div
            class="product-card"
            v-for="product in products"
            :key="product.id"
          >
            <img :src="product.image" alt="Product Image" />
            <h3>{{ product.name }}</h3>
            <p>{{ product.rating }} stars</p>
            <p>{{ product.price }}</p>
            <button>Add to Cart</button>
          </div>
        </div>
        <div class="countdown">
          <p>Ends in: {{ countdown }}</p>
        </div>
        <button class="explore-button">Explore Category</button>
      </div>
    </section> -->
    <!-- General Information Section -->
    <section class="general-info">
      <h2>About Us</h2>
      <p>
        We are a dedicated plant shop with a variety of indoor and outdoor
        plants. Our mission is to provide the best plants for your home and
        garden.
      </p>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newProducts: [
        {
          id: 1,
          name: "Snake Plant",
          description: "A hardy houseplant that thrives on neglect.",
          price: "$25.00",
          image: "@/assets/snake-plant.jpg",
        },
        {
          id: 2,
          name: "Fiddle Leaf Fig",
          description: "A trendy plant with large, glossy leaves.",
          price: "$45.00",
          image: "@/assets/fiddle-leaf-fig.jpg",
        },
        {
          id: 3,
          name: "Pothos",
          description: "An easy-to-care-for trailing plant.",
          price: "$15.00",
          image: "@/assets/pothos.jpg",
        },
        {
          id: 4,
          name: "Peace Lily",
          description: "A beautiful flowering houseplant.",
          price: "$30.00",
          image: "@/assets/peace-lily.jpg",
        },
        {
          id: 1,
          name: "Snake Plant",
          description: "A hardy houseplant that thrives on neglect.",
          price: "$25.00",
          image: "@/assets/snake-plant.jpg",
        },
        {
          id: 2,
          name: "Fiddle Leaf Fig",
          description: "A trendy plant with large, glossy leaves.",
          price: "$45.00",
          image: "@/assets/fiddle-leaf-fig.jpg",
        },
        {
          id: 3,
          name: "Pothos",
          description: "An easy-to-care-for trailing plant.",
          price: "$15.00",
          image: "@/assets/pothos.jpg",
        },
        {
          id: 4,
          name: "Peace Lily",
          description: "A beautiful flowering houseplant.",
          price: "$30.00",
          image: "@/assets/peace-lily.jpg",
        },
        
      ],
      categories: [
        {
          id: 1,
          name: "Indoor Plants",
          image: "@/assets/indoor-plants.jpg",
        },
        {
          id: 2,
          name: "Outdoor Plants",
          image: "@/assets/outdoor-plants.jpg",
        },
        {
          id: 3,
          name: "Succulents",
          image: "@/assets/succulents.jpg",
        },
        {
          id: 4,
          name: "Flowering Plants",
          image: "@/assets/flowering-plants.jpg",
        },
      ],
    };
  },
  methods: {
    addToCart(product) {
      this.cart.push(product);
      alert(`${product.name} has been added to your cart!`);
    },
  },
};
</script>

<style scoped>
/* Hero Section */
.hero {
  background-color: #ffffff;
  background-image: url("/path-to-your-plant-image.jpg");
  background-size: cover;
  background-position: center;
  height: 80vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #333;
  text-align: center;
  overflow: hidden;
}

.hero-content {
  max-width: 50%;
}

.hero-section {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 50%;
  margin-left: 20px;
}

.hero-content h1 {
  font-size: 48px;
  font-weight: bold;
}

.hero-content p {
  font-size: 24px;
  margin: 20px 0;
}

.hero-image {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.shop-now-btn {
  background-color: #678e61;
  color: white;
  border: none;
  padding: 15px 30px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 5px;
}

.shop-now-btn:hover {
  background-color: #567a53;
}

/* Product Section */
.product-section {
  background-color: #f7f7f7;
  padding: 50px 20px;
  text-align: center;
}

.product-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
}

.product-card {
  background-color: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 250px;
  margin: 20px;
  border-radius: 8px;
}

.product-card:hover {
  transform: scale(1.05); /* ขยาย card เมื่อ hover */
}

.product-card img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
}

.product-card h3 {
  font-size: 20px;
  margin: 10px 0;
}

.price-cart-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.product-card .price {
  font-weight: bold;
  color: #678e61;
  margin-right: 10px;
}

.cart-btn {
  background: none;
  border: none;
  cursor: pointer;
  color: #333;
  font-size: 24px;
  transition: color 0.3s;
}

.cart-btn:hover {
  color: #5b7e52;
}

/* Category Grid */
.category-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.category-card {
  background-color: #f9f9f9;
  width: 200px;
  padding: 20px;
  margin: 20px;
  text-align: center;
  border-radius: 8px;
}

.category-card img {
  width: 100%;
  border-radius: 8px;
}

/* General Info Section */
.general-info {
  padding: 50px 20px;
  text-align: center;
  background-color: #f0f0f0;
}

.general-info {
  background-color: #ffffff;
  padding: 50px 20px;
  text-align: center;
}
</style>
