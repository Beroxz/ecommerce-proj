<template>
  <div v-if="order" class="p-6 bg-white shadow-md rounded-lg">
    <!--  Order Details-->
    <div>
      <h2
        class="flex justify-between items-center text-2xl font-semibold pb-4 border-b border-gray-300"
      >
        Order Details
        <OrderStatus :order="order" />
      </h2>
      <table class="w-full mt-4">
        <tbody>
          <tr>
            <td class="font-bold py-2 px-4">Order #</td>
            <td class="py-2 px-4">{{ order.id }}</td>
          </tr>
          <tr>
            <td class="font-bold py-2 px-4">Order Date</td>
            <td class="py-2 px-4">{{ order.created_at }}</td>
          </tr>
          <tr>
            <td class="font-bold py-2 px-4">Order Status</td>
            <td class="py-2 px-4">
              <select
                v-model="order.status"
                @change="onStatusChange"
                class="border rounded p-1"
              >
                <option
                  v-for="status of orderStatuses"
                  :value="status"
                  :key="status"
                >
                  {{ status }}
                </option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="font-bold py-2 px-4">SubTotal</td>
            <td class="py-2 px-4">
              {{ $filters.currencyTHB(order.total_price) }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--/  Order Details-->

    <!--  Customer Details-->
    <div>
      <h2 class="text-2xl font-semibold mt-6 pb-4 border-b border-gray-300">
        Customer Details
      </h2>
      <table class="w-full mt-4">
        <tbody>
          <tr>
            <td class="font-bold py-2 px-4">Full Name</td>
            <td class="py-2 px-4">
              {{ order.customer.first_name }} {{ order.customer.last_name }}
            </td>
          </tr>
          <tr>
            <td class="font-bold py-2 px-4">Email</td>
            <td class="py-2 px-4">{{ order.customer.email }}</td>
          </tr>
          <tr>
            <td class="font-bold py-2 px-4">Phone</td>
            <td class="py-2 px-4">{{ order.customer.phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--/  Customer Details-->

    <!--  Addresses Details-->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
      <div>
        <h2 class="text-2xl font-semibold pb-4 border-b border-gray-300">
          Billing Address
        </h2>
        <!--  Billing Address Details-->
        <div class="mt-2">
          {{ order.customer.billingAddress.address1 }},
          {{ order.customer.billingAddress.address2 }} <br />
          {{ order.customer.billingAddress.city }},
          {{ order.customer.billingAddress.zipcode }} <br />
          {{ order.customer.billingAddress.state }},
          {{ order.customer.billingAddress.country }} <br />
        </div>
        <!--/  Billing Address Details-->
      </div>
      <div>
        <h2 class="text-2xl font-semibold pb-4 border-b border-gray-300">
          Shipping Address
        </h2>
        <!--  Shipping Address Details-->
        <div class="mt-2">
          {{ order.customer.shippingAddress.address1 }},
          {{ order.customer.shippingAddress.address2 }} <br />
          {{ order.customer.shippingAddress.city }},
          {{ order.customer.shippingAddress.zipcode }} <br />
          {{ order.customer.shippingAddress.state }},
          {{ order.customer.shippingAddress.country }} <br />
        </div>
        <!--/  Shipping Address Details-->
      </div>
    </div>
    <!--/  Addresses Details-->

    <!--    Order Items-->
    <div class="mt-6">
      <h2 class="text-2xl font-semibold pb-4 border-b border-gray-300">
        Order Items
      </h2>
      <div
        v-for="item of order.items"
        :key="item.product.id"
        class="border-b pb-4 mb-4"
      >
        <!-- Order Item -->
        <div class="flex flex-col sm:flex-row items-center gap-4">
          <a
            href="#"
            class="w-36 h-32 flex items-center justify-center overflow-hidden"
          >
            <img
              :src="item.product.image"
              class="object-cover"
              alt="Product Image"
            />
          </a>
          <div class="flex flex-col justify-between flex-1">
            <div class="flex justify-between mb-3">
              <h3 class="text-lg font-semibold">{{ item.product.title }}</h3>
            </div>
            <div class="flex justify-between items-center">
              <div class="flex items-center">Qty: {{ item.quantity }}</div>
              <span class="text-lg font-semibold">
                {{ $filters.currencyTHB(item.unit_price) }}
              </span>
            </div>
          </div>
        </div>
        <!--/ Order Item -->
      </div>
    </div>
    <!--/    Order Items-->
  </div>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue';
import store from '../../store';
import { useRoute } from 'vue-router';
import axiosClient from '../../axios.js';
import OrderStatus from './OrderStatus.vue';

const route = useRoute();

const order = ref(null);
const orderStatuses = ref([]);

onMounted(() => {
  store.dispatch('getOrder', route.params.id).then(({ data }) => {
    order.value = data;
  });

  axiosClient
    .get(`/orders/statuses`)
    .then(({ data }) => (orderStatuses.value = data));
});

function onStatusChange() {
  axiosClient
    .post(`/orders/change-status/${order.value.id}/${order.value.status}`)
    .then(({ data }) => {
      store.commit(
        'showToast',
        `Order status was successfully changed into "${order.value.status}"`,
      );
    });
}
</script>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}

td {
  border: 1px solid #e2e8f0;
  padding: 8px;
}

h2 {
  border-bottom: 2px solid #e2e8f0;
  padding-bottom: 8px;
}

.border-b {
  border-bottom-width: 2px;
}

.border-gray-300 {
  border-color: #d1d5db;
}
</style>
