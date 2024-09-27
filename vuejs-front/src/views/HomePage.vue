<template>
  <div class="home-page">
    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <h1>
          <span class="highlight-black">Bring </span>
          <span class="highlight-green">Nature </span>
          <span class="highlight-black">to </span>
          <span class="highlight-black">Your </span>
          <span class="highlight-green">Home </span>
        </h1>
        <p>
          Discover our curated collection of plants, perfect for any space.
          Brighten your day and purify your air with the beauty of nature.
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
          <div>
            <img :src="requireImage(product.image)" :alt="product.name" />
          </div>

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

    <!-- General Information Section -->
    <section class="general-info">
      <h2>About Us</h2>
      <p>
        We are a dedicated plant shop with a variety of indoor and outdoor
        plants. Our mission is to provide the best plants for your home and
        garden.
      </p>

      <!-- Plant Care Tips Section -->
      <section class="plant-care">
        <h3>How to Take Care of Your Plants</h3>
        <div class="care-tips">
          <div class="tip">
            <img src="@/assets/tip1.png" alt="Sunlight Tips" />
            <h4>Sunlight</h4>
            <p>
              Most indoor plants thrive in indirect sunlight. Avoid placing
              plants in direct sunlight for long periods.
            </p>
          </div>
          <div class="tip">
            <img src="@/assets/tip2.png" alt="Watering Tips" />
            <h4>Watering</h4>
            <p>
              Water your plants only when the top layer of soil feels dry.
              Overwatering can lead to root rot.
            </p>
          </div>
          <div class="tip">
            <img src="@/assets/tip3.png" alt="Fertilizer Tips" />
            <h4>Fertilizer</h4>
            <p>
              Use a balanced fertilizer once a month to keep your plants healthy
              and growing.
            </p>
          </div>
        </div>
      </section>

      <!-- Customer Reviews Section -->
      <section class="customer-reviews">
        <h3>Customer Reviews</h3>
        <div class="reviews">
          <div class="review">
            <img src="@/assets/review1.png" alt="Customer 1" />
            <h4>Jane Doe</h4>
            <p>
              "Great quality plants! My living room has never looked better."
            </p>
          </div>
          <div class="review">
            <img src="@/assets/review2.png" alt="Customer 2" />
            <h4>John Smith</h4>
            <p>
              "The staff was very helpful, and they gave me the best advice on
              how to care for my new plants."
            </p>
          </div>
        </div>
      </section>
    </section>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      newProducts: [
        {
          id: 1,
          name: "Snake Plant",
          description: "A hardy houseplant that thrives on neglect.",
          price: "$25.00",
          image: "/assets/products/1.png",
        },
        {
          id: 2,
          name: "Fiddle Leaf Fig",
          description: "A trendy plant with large, glossy leaves.",
          price: "$45.00",
          image: "/assets/products/1.png",
        },
        {
          id: 3,
          name: "Pothos",
          description: "An easy-to-care-for trailing plant.",
          price: "$15.00",
          image: "/assets/products/1.png",
        },
        {
          id: 4,
          name: "Peace Lily",
          description: "A beautiful flowering houseplant.",
          price: "$30.00",
          image: "/assets/products/1.png",
        },
        {
          id: 1,
          name: "Snake Plant",
          description: "A hardy houseplant that thrives on neglect.",
          price: "$25.00",
          image: "/assets/products/1.png",
        },
        {
          id: 2,
          name: "Fiddle Leaf Fig",
          description: "A trendy plant with large, glossy leaves.",
          price: "$45.00",
          image: "/assets/products/1.png",
        },
        {
          id: 3,
          name: "Pothos",
          description: "An easy-to-care-for trailing plant.",
          price: "$15.00",
          image: "/assets/products/1.png",
        },
        {
          id: 4,
          name: "Peace Lily",
          description: "A beautiful flowering houseplant.",
          price: "$30.00",
          image: "/assets/products/1.png",
        },
      ],
      categories: [
        {
          id: 1,
          name: "Indoor Plants",
          image: "assets/indoor-plants.png",
        },
        {
          id: 2,
          name: "Outdoor Plants",
          image: "assets/outdoor-plants.png",
        },
        {
          id: 3,
          name: "Succulents",
          image: "assets/succulents.png",
        },
        {
          id: 4,
          name: "Flowering Plants",
          image: "assets/flowering-plants.png",
        },
      ],
    };
  },
  methods: {
    addToCart(product) {
      this.cart.push(product);
      alert(`${product.name} has been added to your cart!`);
    },
    requireImage(imagePath) {
      return `@${imagePath}`;
    },
  },
};
</script>

<style scoped>
/* Hero Section */
.hero {
  background-color: #ffffff;
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
  text-align: left;
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

.highlight-green {
  color: #659e38;
}

.highlight-black {
  color: #494747;
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
  background-color: #90ac7f;
  color: white;
  border: none;
  padding: 13px 30px;
  font-size: 18px;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.shop-now-btn:hover {
  background-color: #6d8b68ee;
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

.plant-care {
  padding: 50px 20px;
}

.customer-reviews {
  padding: 50px 20px;
}

h2,
h3 {
  color: #2c3e50;
}

.care-tips,
.reviews {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 20px;
}

.tip,
.review {
  flex: 1 1 30%;
  background-color: #fff;
  border: 1px solid #ddd;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.review img {
  width: 100%;
  max-width: 700px;
  max-height: 300px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 30px;
}

.tip img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin-bottom: 10px;
}

h4 {
  margin-bottom: 10px;
  font-size: 18px;
  color: #2c3e50;
}

p {
  color: #666;
}

@media (max-width: 768px) {
  .hero {
    height: calc(60vh - 20px);
    margin-top: 20px;
    padding: 20px;
  }

  .hero-content {
    max-width: 90%;
    text-align: center;
  }

  .hero-section {
    display: none;
  }

  .hero-content h1 {
    font-size: 30px;
  }

  .hero-content p {
    font-size: 16px;
  }

  .shop-now-btn {
    padding: 8px 10px;
    font-size: 14px;
  }

  .product-section {
    padding: 30px 10px;
  }

  .product-grid {
    justify-content: center;
  }

  .product-card {
    width: 100%;
    max-width: 250px;
  }

  .category-grid {
    justify-content: center;
  }

  .category-card {
    width: 100%;
    max-width: 200px;
  }

  /* General Info Section */
  .general-info,
  .plant-care,
  .customer-reviews {
    padding: 30px 10px;
  }

  /* Care Tips and Reviews */
  .tip,
  .review {
    flex: 1 1 100%;
  }
}

@media (min-width: 769px) and (max-width: 1200px) {
  .hero {
    padding-left: 20px;
    padding-right: 20px;
  }

  .tip,
  .review {
    flex: 1 1 30%;
  }
}
</style>
