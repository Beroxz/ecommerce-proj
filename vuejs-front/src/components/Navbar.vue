<template>
  <nav class="navbar">
    <div class="container">
      <a href="#" class="logo">Perdis.</a>

      <div class="search-wrapper">
        <div class="search-container">
          <i class="fa fa-search search-icon"></i>
          <input type="text" class="search-bar" placeholder="Search..." />
        </div>
        <!-- <button class="search-button">Search</button> -->
      </div>

      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li class="dropdown">
          <a href="#">Shop</a>
          <ul class="dropdown-content">
            <li><a href="#">Fruits</a></li>
            <li><a href="#">Vegetables</a></li>
            <li><a href="#">Dairy</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#">About Us</a>
        </li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Login</a></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style scoped>
.navbar {
  background-color: #ededed;
  padding: 10px 0;
  color: #fff;
  min-height: 90px;
}

.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
}

ul li a {
  font-size: 18px;
  font-weight: 600;
  color: #3f3e3e;
  text-decoration: none;
}

.logo {
  font-size: 36px;
  font-weight: bold;
  color: #3f3e3e;
  text-decoration: none;
}

.search-wrapper {
  display: flex;
  align-items: center;
  gap: 5px;
}

.search-container {
  position: relative;
  display: flex;
  align-items: center;
  box-sizing: border-box;
}

.search-bar {
  padding: 8px 36px 8px 12px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 10px;
  width: 280px;
  box-sizing: border-box;
}

.search-button {
  background-color: #678e61;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 8px 12px;
  cursor: pointer;
  margin-left: 5px;
  transition: background-color 0.3s;
}

.search-bar:hover {
  border: 1px solid #696767;
}

.search-bar:focus {
  border: 1px solid #696767;
  background-color: #f9f9f9;
  outline: none;
}

.search-icon {
  position: absolute;
  right: 10px;
  font-size: 16px;
  color: #333;
  pointer-events: none;
}

.nav-links {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.nav-links li {
  margin-right: 70px;
}

.nav-links a {
  text-decoration: none;
  color: #333;
}

.nav-links a:hover {
  text-decoration: none;
  color: #678e61;
}

.dropdown {
  position: relative;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content a {
  color: #333;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .container {
    flex-direction: column;
    align-items: flex-start;
  }

  .nav-links {
    flex-direction: column;
    margin-top: 10px;
  }

  .nav-links li {
    margin-right: 0;
    margin-bottom: 10px;
  }

  .search-bar {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .logo {
    font-size: 28px;
  }

  .search-bar {
    font-size: 14px;
    padding: 6px 24px 6px 8px;
  }

  .search-button {
    padding: 6px 10px;
  }

  .nav-links a {
    font-size: 16px;
  }
}
</style>
