<template>
  <nav class="navbar">
    <div class="container">
      <a href="#" class="logo">Perdis.</a>

      <div class="search-wrapper">
        <div class="search-container">
          <i class="fa fa-search search-icon"></i>
          <input type="text" class="search-bar" placeholder="Search..." />
        </div>
      </div>

      <div class="menu-toggle" @click="toggleMenu">
        <i :class="menuOpen ? 'fa fa-times' : 'fa fa-bars'"></i>
      </div>

      <ul class="nav-links" :class="{ active: menuOpen }">
        <li><a href="#/home">Home</a></li>
        <li v-if="userRole === 'customer'">
          <a href="#/shop">Shop</a>
        </li>
        <li>
          <a href="#/about">About Us</a>
        </li>
        <li><a href="#/contact">Contact</a></li>
        <li v-if="userRole === 'guest'"><a href="#/login">Login</a></li>
        <div class="icon-container" v-if="userRole === 'customer'">
          <div
            class="icon-item"
            @mouseenter="showTooltip('Cart')"
            @mouseleave="hideTooltip"
          >
            <a href="#/cart" class="icon">
              <i class="fas fa-shopping-bag"></i>
              <span class="badge">1</span>
            </a>
            <span v-if="tooltipMessage === 'Cart'" class="tooltip">{{
              tooltipMessage
            }}</span>
          </div>
          <div
            class="icon-item"
            @mouseenter="showTooltip('Profile')"
            @mouseleave="hideTooltip"
          >
            <a href="#/profile" class="icon">
              <i class="fas fa-user"></i>
            </a>
            <span v-if="tooltipMessage === 'Profile'" class="tooltip">{{
              tooltipMessage
            }}</span>
          </div>
        </div>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      menuOpen: false,
      tooltipMessage: "",
      userRole: "guest",
    };
  },
  methods: {
    toggleMenu() {
      this.menuOpen = !this.menuOpen;
    },
    showTooltip(message) {
      this.tooltipMessage = message;
    },
    hideTooltip() {
      this.tooltipMessage = "";
    },
  },
};
</script>

<style scoped>
.navbar {
  background-color: #ededed;
  padding: 10px 0;
  color: #fff;
  min-height: 90px;
  position: sticky;
  top: 0;
  z-index: 1000;
  transition: background-color 0.3s ease, padding 0.3s ease;
}

.navbar.scrolled {
  background-color: #ededed;
  padding: 5px 0;
}

.container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin: 0 auto;
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
  display: flex;
  justify-content: center;
  align-items: center;
  list-style: none;
  gap: 0px;
  padding: 0;
  margin: 0;
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

ul li a {
  font-size: 18px;
  font-weight: 600;
  color: #3f3e3e;
  text-decoration: none;
}

.icon-container {
  display: flex;
  align-items: center;
  gap: 40px;
}

.icon-item {
  position: relative;
}

.icon {
  font-size: 24px;
  color: #333;
  text-decoration: none;
}

.badge {
  position: absolute;
  top: -5px;
  right: -10px;
  background-color: #e74c3c;
  color: white;
  padding: 3px 6px;
  border-radius: 50%;
  font-size: 12px;
}

.tooltip {
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 5px;
  padding: 5px 10px;
  background-color: black;
  color: white;
  border-radius: 5px;
  font-size: 12px;
  white-space: nowrap;
  opacity: 0.75;
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
.menu-toggle {
  display: none;
  cursor: pointer;
  color: #333;
}

@media (max-width: 768px) {
  .container {
    flex-direction: column;
    align-items: flex-start;
  }

  .nav-links {
    flex-direction: column;
    margin-top: 10px;
    display: none;
    text-align: center;
  }

  .nav-links.active {
    display: flex;
  }

  .nav-links li {
    margin-right: 0;
    margin-bottom: 10px;
  }

  .search-bar {
    width: 100%;
  }

  .menu-toggle {
    display: block;
    font-size: 24px;
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
