<template>
  <div class="homepage">
    <header class="header">
      <h1>Plant Store</h1>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [
        { id: 1, name: "Succulent", price: "$10.00", image: "path/to/succulent.jpg" },
        { id: 2, name: "Fiddle Leaf Fig", price: "$20.00", image: "path/to/fig.jpg" },
        { id: 3, name: "Monstera", price: "$15.00", image: "path/to/monstera.jpg" }
      ]
    };
  }
};
</script>

<style scoped>
.homepage {
  font-family: 'Arial, sans-serif';
  color: #333;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #009688;
  padding: 20px;
  color: white;
}

.header h1 {
  margin: 0;
}

.header nav ul {
  list-style: none;
  padding: 0;
  display: flex;
  gap: 15px;
}

.header nav a {
  color: white;
  text-decoration: none;
}
</style>
