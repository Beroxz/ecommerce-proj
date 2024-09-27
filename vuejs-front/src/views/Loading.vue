<!-- src/components/Loading.vue -->
<template>
  <div class="loading-overlay" v-if="isLoading">
    <div class="loading">Loading...</div>
  </div>
</template>

<script>
export default {
  name: "Loading",
  props: {
    isLoading: {
      type: Boolean,
      required: true,
    },
  },
};
</script>

<style scoped>
.loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(255, 255, 255, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.loading {
  font-size: 24px;
  color: #333;
}
</style>
