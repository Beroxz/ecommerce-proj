<template>
  <div
    class="min-w-[160px] w-[160px] transition-all bg-indigo-700 text-white py-4 px-2"
  >
    <h2 class="text-lg font-semibold mb-4 text-center">
      {{
        currentUser.role === 1
          ? "Admin"
          : currentUser.role === 2
          ? "Seller"
          : ""
      }}
    </h2>

    <router-link
      v-if="currentUser.role === 1"
      :to="{ name: 'app.dashboard' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <HomeIcon class="w-5" />
      </span>
      <span class="text-xs"> Dashboard </span>
    </router-link>

    <router-link
      v-if="currentUser.role === 2"
      :to="{ name: 'app.dashboard' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <HomeIcon class="w-5" />
      </span>
      <span class="text-xs"> Dashboard </span>
    </router-link>

    <!-- Categories management link only for Admin -->
    <router-link
      v-if="currentUser.role === 1"
      :to="{ name: 'app.categories' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <CollectionIcon class="w-5" />
      </span>
      <span class="text-xs"> Categories </span>
    </router-link>

    <!-- Product management link only for Seller -->
    <router-link
      v-if="currentUser.role === 2"
      :to="{ name: 'app.products' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <CubeIcon class="w-5" />
      </span>
      <span class="text-xs"> Products </span>
    </router-link>

    <!-- Order management link for Seller -->
    <router-link
      v-if="currentUser.role === 2"
      :to="{ name: 'app.orders' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <ShoppingCartIcon class="w-5" />
      </span>
      <span class="text-xs"> Orders </span>
    </router-link>

    <!-- User management link only for Admin -->
    <router-link
      v-if="currentUser.role === 1"
      :to="{ name: 'app.users' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <UsersIcon class="w-5" />
      </span>
      <span class="text-xs"> Users </span>
    </router-link>

    <!-- Seller management link only for Admin -->
    <router-link
      v-if="currentUser.role === 1"
      :to="{ name: 'app.sellers' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <UserGroupIcon class="w-5" />
      </span>
      <span class="text-xs"> Sellers </span>
    </router-link>

    <!-- Customers link for both Admin -->
    <router-link
      v-if="currentUser.role === 1"
      :to="{ name: 'app.customers' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <UserGroupIcon class="w-5" />
      </span>
      <span class="text-xs"> Customers </span>
    </router-link>

    <router-link
      :to="{ name: 'reports.orders' }"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30"
      active-class="bg-black/30"
    >
      <span class="mr-2 text-gray-300">
        <ChartBarIcon class="w-5" />
      </span>
      <span class="text-xs"> Reports </span>
    </router-link>
  </div>
</template>

<script setup>
import {
  HomeIcon,
  UserGroupIcon,
  UsersIcon,
  ChartBarIcon,
  CubeIcon,
  CollectionIcon,
  ShoppingCartIcon,
} from "@heroicons/vue/outline";

import store from "../store";
import { computed } from "vue";

const currentUser = computed(() => store.state.user.data);
</script>

<style scoped></style>
