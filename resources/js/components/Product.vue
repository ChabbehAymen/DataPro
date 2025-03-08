<script setup>
const props = defineProps(['id', 'title', 'desc', 'price'])
</script>
<template>
    <div :id="props.id" class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl z-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <!-- Product Image -->
        <img src="/public/images/arm-site-img.png" alt="Armoire Informatique" class="w-full h-48 object-cover rounded-md mb-4">

        <!-- Product Info -->
        <div>
          <h2 class="text-lg font-semibold text-gray-800 hover:text-blue-600 transition duration-300">{{ props.title }}</h2>
          <p class="text-gray-500 text-sm mt-1">{{ props.desc }}</p>
          <p class="text-blue-600 font-bold mt-3 text-xl">{{ props.price }} MAD</p>
        </div>

        <!-- CTA Buttons -->
        <div class="mt-4 flex justify-between items-center">
          <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 text-sm font-medium">Ajouter au panier</button>
          <button class="text-gray-700 hover:text-green-600 transition duration-300 transform hover:scale-110 text-xl">
            <i class="fas fa-star"></i>
          </button>
        </div>
      </div>
</template>

