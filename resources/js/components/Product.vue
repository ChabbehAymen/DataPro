<script setup>
const props = defineProps(['id', 'title', 'desc', 'price', 'category'])
</script>
<template>

    <div :id="props.id"
        class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
        <div class="overflow-x-hidden rounded-2xl relative">
            <span
                class="tracking-wider text-white bg-blue-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold"
                title=""> Winner
                <!-- <i class="fas fa-award" aria-hidden="true"></i> -->
            </span>
            <img class="h-40 rounded-2xl w-full object-cover" src="/public/images/arm-site-img.png">
            <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none"
                    viewBox="0 0 24 24" stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </p>
        </div>
        <div class="mt-4 pl-2 mb-2 flex justify-between ">
            <div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1 line-clamp-2">{{ props.title }}</h2>
                    <p class="text-sm text-gray-600">{{ props.category[0].title }}</p>
                </div>
                <p class="text-lg font-bold text-green-600">{{ props.price }} DT</p>
            </div>
            <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                    viewBox="0 0 24 24" stroke="gray">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> -->
    <!-- component -->
    <!-- <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-sm w-72" :id="props.id">
        <div class="relative">
            <img src="/public/images/arm-site-img.png" alt="Product image" class="w-full h-52 object-cover">
            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">SALE</span> -->
    <!-- <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-4 h- text-center text-blue-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7 4C18.87 4 21 6.98 21 9.76C21 15.39 12.16 20 12 20C11.84 20 3 15.39 3 9.76C3 6.98 5.13 4 8.3 4C10.12 4 11.31 4.91 12 5.71C12.69 4.91 13.88 4 15.7 4Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </button> --> <!-- ?? for favorites feature-->
    <!-- </div>
        <div class="p-4">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1 line-clamp-2">{{ props.title }}</h2>
                    <p class="text-sm text-gray-600">{{ props.category[0].title }}</p>
                </div>
            </div>
                <div class="py-2">
                    <p class="text-lg font-bold text-green-600">{{ props.price }} DT</p> -->
    <!-- <p class="text-sm text-gray-500 line-through">$159.99</p> --> <!-- ?? Price Marketing Feature-->
    <!-- </div> -->
    <!-- <div class="flex items-center mb-2">
                <div class="flex text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> 
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span class="text-gray-600 text-sm ml-2">(4.5/5)</span>
            </div> --> <!-- ?? Reviews Feature-->
    <!-- <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ props.desc }}</p>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <i class="fas fa-truck text-blue-500 mr-2"></i>
                    <span class="text-sm text-gray-600">Free Shipping</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-clock text-blue-500 mr-2"></i>
                    <span class="text-sm text-gray-600">In Stock</span>
                </div>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-blue-500 text-white py-2 px-4 rounded-full font-semibold hover:bg-blue-600 transition-colors duration-200">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-800 py-2 px-4 rounded-full font-semibold hover:bg-gray-300 transition-colors duration-200">
                    Quick View
                </button>
            </div>
        </div>
    </div> -->
</template>
