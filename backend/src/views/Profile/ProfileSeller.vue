<template>
  <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Seller Profile</h2>
    <form @submit.prevent="submitForm">
      <div class="mb-4">
        <label for="firstName" class="block text-sm font-medium text-gray-700"
          >First Name</label
        >
        <input
          v-model="form.firstName"
          type="text"
          id="firstName"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="lastName" class="block text-sm font-medium text-gray-700"
          >Last Name</label
        >
        <input
          v-model="form.lastName"
          type="text"
          id="lastName"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="storeName" class="block text-sm font-medium text-gray-700"
          >Store Name</label
        >
        <input
          v-model="form.storeName"
          type="text"
          id="storeName"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="storePhone" class="block text-sm font-medium text-gray-700"
          >Store Phone</label
        >
        <input
          v-model="form.storePhone"
          type="tel"
          id="storePhone"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label
          for="storeDescription"
          class="block text-sm font-medium text-gray-700"
          >Store Description</label
        >
        <textarea
          v-model="form.storeDescription"
          id="storeDescription"
          rows="4"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        ></textarea>
      </div>

      <div class="mb-4">
        <label
          for="storeAddress"
          class="block text-sm font-medium text-gray-700"
          >Store Address</label
        >
        <input
          v-model="form.storeAddress"
          type="text"
          id="storeAddress"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-4">
        <label for="storeRating" class="block text-sm font-medium text-gray-700"
          >Store Rating</label
        >
        <input
          v-model="form.storeRating"
          type="number"
          id="storeRating"
          min="0"
          max="5"
          step="0.1"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div class="mb-6">
        <label for="storeImage" class="block text-sm font-medium text-gray-700"
          >Store Image</label
        >
        <input
          type="file"
          id="storeImage"
          @change="handleFileUpload"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
        />
      </div>

      <div>
        <button
          type="submit"
          class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
        >
          Save Profile
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        storeName: '',
        storePhone: '',
        storeDescription: '',
        storeAddress: '',
        storeRating: null,
      },
      storeImage: null,
    };
  },
  methods: {
    submitForm() {
      console.log('Form submitted:', this.form);
    },
    handleFileUpload(event) {
      this.storeImage = event.target.files[0];
    },
  },
};
</script>

<style scoped></style>
