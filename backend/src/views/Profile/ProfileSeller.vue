<template>
  <div class="mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Seller Profile</h2>
    <form @submit.prevent="submitForm">
      <CustomInput
        class="mb-2"
        v-model="form.storeName"
        label="Store Name"
        :errors="errors.storeName"
      />

      <CustomInput
        class="mb-2"
        v-model="form.storePhone"
        label="Store Phone"
        :errors="errors.storePhone"
      />

      <CustomInput
        class="mb-2"
        v-model="form.storeDescription"
        label="Store Description"
        type="textarea"
        :errors="errors.storeDescription"
      />

      <CustomInput
        class="mb-2"
        v-model="form.storeAddress"
        label="Store Address"
        :errors="errors.storeAddress"
      />

      <footer class="rounded-b-lg py-3 sm:flex sm:flex-row-reverse">
        <button
          type="submit"
          class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 ml-auto"
        >
          Submit
        </button>
      </footer>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { onMounted, ref } from 'vue';
import CustomInput from '../../components/core/CustomInput.vue';

const form = ref({
  storeName: '',
  storePhone: '',
  storeDescription: '',
  storeAddress: '',
});

const errors = ref({});

function submitForm() {
  console.log('Form submitted:', form);
}
</script>
