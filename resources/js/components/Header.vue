<template>
    <div class=" fixed top-0 w-[100vw] z-50 flex flex-col">
        <header class="bg-white shadow-md p-3 flex items-center justify-between md:pl-4">
            <div class="flex items-center w-full">
                <div class="flex items-center">
                    <button @click="$emit('toggleSidebar')"
                        class="text-gray-700 text-2xl p-2 focus:outline-none md:hidden">
                        &#9776;
                    </button>
                    <a class="font-bold text-3xl no-underline text-gray-900 dark:text-gray-100" href="/">DataPro<span
                            style="color: #FF7F50;">.</span>
                    </a>
                </div>
                <nav class="hidden sm:flex items-center w-full pb-0">
                    <a class="no-underline text-black px-4 py-2 mt-2 text-sm font-semibold md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="/">Home</a>
                    <div class="relative ">
                        <button @click="toggleMenu"
                            class="text-gray-900 bg-gray-200 items-center px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            style="display: flex;">
                            <span>Categories</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="iconRotation"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div v-show="isMenuOpen"
                            class="absolute left-0 w-full w-[20vw]  mt-2 origin-top-right transition-transform duration-200 ease-out scale-95 group-open:scale-100 group-open:opacity-100">
                            <div class=" px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark-mode:bg-gray-700">
                                <div class="flex flex-col">
                                    <span class=""></span>
                                    <div :id="cat.id" v-for="cat in categories" :key="cat.id"
                                        class="text-sm inline-flex items-center font-bold leading-sm px-3 py-1 bg-white text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-hard-drive mr-2 text-bold">
                                            <line x1="22" y1="12" x2="2" y2="12"></line>
                                            <path
                                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                            </path>
                                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                                        </svg>
                                        {{ cat.title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="no-underline text-black px-4 py-2 mt-2 text-sm font-semibold md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="#">What's New</a>
                    <a class="no-underline text-black px-4 py-2 mt-2 text-sm font-semibold md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        href="#">About</a>
                </nav>
            </div>

            <div class="flex items-center gap-3 pr-3">
                <!-- Search Bar -->
                <div class='hidden md:block w-full max-w-sm bg-gray-100 rounded-3xl relative'>
                    <div
                        class="flex items-center px-3.5 py-1 text-gray-400 group focus-within:!ring-2 focus-within:!ring-blue-500 rounded-full">
                        <svg class="mr-2 h-5 w-5 stroke-slate-400" fill="none" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                        <input
                            @keyup="searchProducts"
                            class="block w-full appearance-none bg-transparent text-base text-gray-700 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6"
                            placeholder="Find anything..." aria-label="Search components"
                            id="headlessui-combobox-input-:r5n:" role="combobox" type="text" aria-expanded="false"
                            aria-autocomplete="list" value="" style="caret-color: rgb(107, 114, 128)" />
                    </div>
                    
                    <div v-show="showData && !showEmpty" class="absolute -bottom-[17rem] shadow rounded left-0 w-72 h-64 bg-white">
                        <div v-show="showData" class="w-full h-full overflow-y-auto p-2">
                            <div v-for="product in searchedProducts" :key="product.id" @click="() => { navigate(`/product/${product.id}`) }" class="flex items-center gap-1 justify-between border-bottom mb-2 pb-2 cursor-pointer hover:bg-gray-100">
                                <div class="flex items-center justify-center gap-1">
                                    <div class=" h-[5vh] w-[5vw] bg-contain bg-no-repeat bg-center" :style="{ backgroundImage: `url(${product.product_image[0].img})` }"></div>
                                    <p class="p-0 m-0  overflow-hidden">{{ product.title }}</p>
                                </div>
                                <p class="p-0 m-0 text-green-500">{{ product.price }} DT</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button v-show="props.isloged == false" @click="() => { navigate('/login') }"
                    class="cursor-pointer flex items-center gap-1 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-log-in mr-2">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    Login
                </button>
                <span v-show="props.isloged" @click="() => { navigate('/profile') }">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:opacity-50" fill="none"
                        viewBox="0 0 24 24" stroke="black">
                        <!-- Head -->
                        <circle cx="12" cy="8" r="4" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />

                        <!-- Slightly Closed Body -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 20c0-3 3-6 6-6s6 3 6 6" />
                    </svg>

                </span>
                <span v-show="props.isloged" @click="() => { navigate('/commande') }">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:opacity-50" fill="none"
                        viewBox="0 0 24 24" stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </span>
                <span v-show="props.isloged" class="hidden sm:flex gap-2 hover:bg-gray-100 p-2 items-center"
                    @click="handleLogout">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Logout
                </span>
            </div>
        </header>
    </div>
</template>
<script setup>
import { computed, onMounted, ref } from "vue";
import { navigate } from "../utils/utils";
import { fetchCategories, fetchProductsByTitle, logout } from '../utils/api';

const isMenuOpen = ref(false);
const categories = ref([]);
const showEmpty = ref(false);
const showData = ref(false);
const searchedProducts = ref([]);
const iconRotation = computed(() => isMenuOpen.value ? 'rotate-180' : 'rotate-0');
const props = defineProps(['isloged']);
const emit = defineEmits(['toggleSidebar']);


const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const getCategories = () => {
    fetchCategories().then((data) => {
        categories.value = data;
    })
}

const handleLogout = () => {
    logout();
    navigate('/');
}
onMounted(() => {
    getCategories();
});

const searchProducts = (e) => {
    if (e.target.value === '') {
        showEmpty.value = false;
        showData.value = false;
        return;
    }
    fetchProductsByTitle(e.target.value).then((data) => {
        searchedProducts.value = data;
        showEmpty.value = data.length === 0 && e.target.value !== '';
        showData.value = data.length > 0 && e.target.value !== '';
        console.log(data, e.target.value, showEmpty.value, showData.value);
    })
}

</script>
<style></style>
