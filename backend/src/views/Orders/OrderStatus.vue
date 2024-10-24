<template>
  <span
    class="text-white py-1 px-2 rounded"
    :class="{
      'bg-emerald-500': ['Paid', 'Completed'].includes(order.status),
      'bg-orange-400': order.status === 'Shipped',
      'bg-red-500': order.status === 'Cancelled',
      'bg-gray-400': order.status === 'Unpaid',
    }"
    >{{ order.status }}</span
  >
</template>

<script setup>
const { order } = defineProps({
  order: Object,
});
</script>

<style scoped></style>
