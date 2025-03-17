<script setup>
import Tag from './Tag.vue';
const props = defineProps(['id', 'title', 'desc', 'price', 'category'])
</script>
<template>
    <div :id="props.id"
        class="relative min-w-[15rem] w-[25%] h-[50vh] bg-white shadow rounded-3xl p-2 mx-1 my-3 cursor-pointer">
        <div class="rounded-2xl relative">
            <Tag title="Winner" :id="0" />
            <img class="h-[25vh] rounded-2xl w-full object-cover" src="/public/images/arm-site-img.png">

            <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none"
                    viewBox="0 0 24 24" stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </p>
        </div>
        <div class="mt-3 pl-2 mb-2 flex flex-col w-full">
            <div>
                <h2 class="text-sm font-semibold m-0 text-gray-800 mb-1 w-full line-clamp-2">{{ props.title }}</h2>
                <p class="text-sm text-gray-600">{{ props.category[0].title }}</p>
            </div>
            <div class="flex items-center justify-between w-full">
                <p class="text-lg font-bold text-green-600">{{ props.price }} DT</p>
                <div class="flex flex-col-reverse mb-3 mr-4 self-end group cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                        viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>
