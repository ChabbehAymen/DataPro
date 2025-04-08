<template>
    <div class="fixed top-0 sidebar z-50 flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-screen w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5"
        :class="isOpen">
        <div class="mb-2 p-4 flex items-center justify-around">
            <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900">
                DataPro
            </h5>
            <button @click="$emit('toggleSidebar')" id="btnSidebarToggler" type="button"
                class="py-4 text-2xl text-black hover:text-gray-200">
                <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-8 w-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
            <div role="button" tabindex="0"
                class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                        <path
                            d="M10 20v-6h4v6a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V12h1.5a1 1 0 0 0 .64-1.77l-8.5-7a1 1 0 0 0-1.28 0l-8.5 7A1 1 0 0 0 3.5 12H5v8a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1z"
                            fill="#333" />
                    </svg>
                </div>
                Home
            </div>
            <div class="flex flex-col">
                <div role="button" tabindex="0" @click="toggleCategories"
                    class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="h-5 w-5">
                            <path fill-rule="evenodd"
                                d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    Categories
                    <div class="grid place-items-center ml-auto justify-self-end">
                        <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-blue-500/20 text-blue-900 py-1 px-2 text-xs rounded-full"
                            style="opacity: 1;">
                            <span class="">{{ categories.length }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col pl-6 transition-transform duration-200 ease-out" :class="categoriesCompu">
                    <div  v-for="cat in categories" :key="cat.id" :id="cat.id"
                        :class="categoryCompu"
                        class=" text-sm flex items-center font-bold leading-sm px-3 py-1 text-gray-700 transition-transform duration-200 ease-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
            <div role="button" tabindex="0" @click="()=>{navigate('/profile')}"
                class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>Profile
            </div>
            <div role="button" tabindex="0" @click="logingout"
                class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>Log Out
            </div>
            <div role="button" tabindex="0"
                class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="black" stroke-width="1.5" fill="none" />
                        <path d="M12 8h.01M12 12v4" stroke="black" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>About
            </div>
        </nav>
    </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { fetchCategories, logout } from '../utils/api';
import { navigate } from '../utils/utils';

const props = defineProps(['isopen']);
const categories = ref([]);
const emit = defineEmits(['toggleSidebar']);

const showCategories = ref(false);
const isOpen = computed(() => {
    return {
        'translate-x-0': props.isopen,
        '-translate-x-full': !props.isopen,
    };
});
const logingout =()=>{
    logout().then(()=>{
        navigate('/');
    });
}
const toggleCategories = ()=>
{
    showCategories.value =!showCategories.value;
}
const categoriesCompu = computed(()=>{
    return {
        "h-0": !showCategories.value,
        "": showCategories.value,
    }
});
const categoryCompu = computed(()=>{
    return {
        "d-none":!showCategories.value,
        "flex": showCategories.value,
    }
});

onMounted(() => {
    fetchCategories().then((data) => {
        categories.value = data;
        console.log(data);
    });
});

</script>

<style scoped>
.sidebar {
    transition: transform 0.3s ease-in-out;
}
</style>