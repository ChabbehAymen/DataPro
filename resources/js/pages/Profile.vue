<script setup>
import { ref } from "vue";

const user = ref({
  name: "John Doe",
  email: "johndoe@example.com",
  profilePicture: "https://via.placeholder.com/100",
});

const newProfilePicture = ref(null);
const selectedFile = ref(null);

const updateProfilePicture = (event) => {
  const file = event.target.files[0];
  if (file) {
    selectedFile.value = file;
    const reader = new FileReader();
    reader.onload = (e) => {
      user.value.profilePicture = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};

const saveProfile = () => {
  console.log("Profile saved:", user.value);
  alert("Profile updated successfully!");
};
</script>

<template>
  <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Profile</h2>
    
    <!-- Profile Picture -->
    <div class="flex items-center space-x-4">
      <img :src="user.profilePicture" alt="Profile" class="w-20 h-20 rounded-full border-2 border-gray-300">
      <input type="file" @change="updateProfilePicture" class="hidden" id="fileInput" ref="newProfilePicture">
      <label for="fileInput" class="cursor-pointer bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
        Change Picture
      </label>
    </div>

    <!-- Form Fields -->
    <div class="mt-6">
      <label class="block text-gray-700 font-medium">Name</label>
      <input v-model="user.name" type="text" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300">

      <label class="block text-gray-700 font-medium mt-4">Email</label>
      <input v-model="user.email" type="email" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300" disabled>
    </div>

    <!-- Save Button -->
    <div class="mt-6 text-right">
      <button @click="saveProfile" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
        Save Changes
      </button>
    </div>
  </div>
</template>
