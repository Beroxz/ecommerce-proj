<template>
  <nav class="navbar">
    <div class="container">
      <a href="#" class="logo">Perdis.</a>
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
          <a href="#">Pages</a>
          <ul class="dropdown-content">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </li>
        <li><a href="#">Coupons</a></li>
        <li class="dropdown">
          <a href="#">Blog</a>
          <ul class="dropdown-content">
            <li><a href="#">Recipes</a></li>
            <li><a href="#">Nutrition Tips</a></li>
          </ul>
        </li>
        <li><a href="#">Contact</a></li>
      </ul>
      <div class="user-actions">
        <a href="#" class="user-icon">
          <div class="icon-container">
            <span><i class="fas fa-user"></i></span>
          </div>
          <div class="text-container">
            <span style="color: #dbd7d7">Hello<br /></span>
            <span>Register</span>
          </div>
        </a>

        <a href="#" class="icon">
          <i class="fas fa-heart"></i>
          <span class="badge">0</span>
        </a>
        <a href="#" class="icon">
          <i class="fas fa-shopping-bag"></i>
          <span class="badge">1</span>
        </a>
        <a href="#" class="icon">
          <i class="fas fa-search"></i>
        </a>
      </div>
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
  /* background-color: #a2c36c; */
  background-color: #678e61;
  /* background-color: #10a894; */
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
  font-weight: 400;
  color: #333;
  text-decoration: none;
}

ul li a:hover {
}

.logo {
  font-size: 36px;
  font-weight: bold;
  color: #fff;
  text-decoration: none;
}

.nav-links {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.nav-links li {
  margin-right: 20px;
}

.nav-links a {
  text-decoration: none;
  color: #fff;
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

.user-actions {
  display: flex;
  align-items: center;
}

.user-icon {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: #fff;
  margin-right: 20px;
}

.user-icon i {
  font-size: 18px;
  margin-right: 5px;
}

.icon {
  color: #fff;
  margin-right: 15px;
}

.user-icon {
  display: flex;
  align-items: center;
  text-decoration: none;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s, color 0.3s;
}

.user-icon:hover {
  color: #dbd7d7;
}

.icon-container {
  display: flex;
  align-items: center;
  margin-right: 10px;
}

.icon-container i {
  font-size: 24px;
}

.text-container {
  display: flex;
  flex-direction: column;
}

.text-container span {
  font-size: 14px;
  font-weight: 500;
  line-height: 1.5;
}

.badge {
  background-color: #fff;
  color: #383737;
  padding: 2px 5px;
  border-radius: 50%;
  font-size: 12px;
  position: relative;
  top: -10px;
  left: 10px;
}
</style>
