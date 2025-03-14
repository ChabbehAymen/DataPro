<template>
    <div @mouseover="isOpen = true" @mouseleave="isOpen = false"
        class="sidebar flex flex-col w-16 h-[90%] py-8 space-y-8 bg-blue-900 dark:bg-gray-900 dark:border-gray-700 shadow-md rounded-lg fixed z-50 top-[5%] bottom-[5%]" :class="extandBar">

        <a href="#" class="self-center">
            <img class="w-auto h-6" src="https://merakiui.com/images/logo.svg" alt="">
        </a>

        <a href="#"
            class=" flex p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-400 dark:hover:bg-gray-800 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>

        <a href="#" v-for="category in categories"
            class=" flex p-1.5 text-gray-500 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-400 dark:hover:bg-gray-800 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            <p v-show="isOpen">{{ category.title }}</p>
        </a>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import axios from 'axios';

const categories = ref([]);
const isOpen = ref(false);

const extandBar = computed(() => ({
    'w-max px-auto': isOpen.value,
    'items-center': !isOpen.value,
}));

onMounted(() => {
    axios.get('/categories')
        .then(response => {
            categories.value = response.data.data;
        });
});

</script>

<style scoped></style>