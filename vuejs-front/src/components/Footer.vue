<template>
  <footer class="footer">
    <div class="footer-content">
      <p>© 2024 Greenery World. All rights reserved.</p>
      <div class="footer-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped>
.footer {
  background-color: #678e61;
  color: white;
  padding: 20px 0;
  text-align: center;
}

.footer-links a {
  color: white;
  margin: 0 15px;
  text-decoration: none;
}

.footer-links a:hover {
  text-decoration: underline;
}
</style>
