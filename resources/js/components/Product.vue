<template>
    <div :id="props.product.id"
        class="relative min-w-[15rem] w-[20%] h-[50vh] bg-white shadow rounded-3xl p-2 mx-1 my-3">
        <div class="rounded-2xl relative">
            <Tag v-if="props.product.tag.lenght > 0" :title="props.product.tag[0].title" :id="0" />
            <div :id="imageId"
                class="h-[30vh] w-full bg-contain bg-no-repeat bg-center">
            </div>
            <!-- <img class="h-[25vh] rounded-2xl w-full object-cover" src="/public/images/arm-site-img.png"> -->
        </div>
        <div class="mt-3 pl-2 mb-2 flex flex-col w-full">
            <div>
                <h2 class="text-sm font-semibold m-0 text-gray-800 mb-1 w-full line-clamp-2">{{ props.product.title }}
                </h2>
                <p class="text-sm text-gray-600">{{ props.product.category[0].title }}</p>
            </div>
            <div class="flex items-center justify-between w-full">
                <p class="text-lg font-bold text-green-600">{{ props.product.price }} DT</p>
                <div class="flex gap-2 mb-3 mr-4 self-end cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"
                        class="h-6 w-6 hover:opacity-50" @click="navigateToProduct">
                        <path
                            d="M19,21H5c-1.1,0-2-0.9-2-2V5c0-1.1,0.9-2,2-2h7v2H5v14h14v-7h2v7C21,20.1,20.1,21,19,21z" />
                        <path d="M21 10L19 10 19 5 14 5 14 3 21 3z" />
                        <path d="M6.7 8.5H22.3V10.5H6.7z" transform="rotate(-45.001 14.5 9.5)" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:opacity-50" fill="none"
                        @click="emit('addProductToCart', props.product.id)" viewBox="0 0 24 24" stroke="black">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { defineProps, defineEmits, onMounted } from 'vue';
import Tag from './Tag.vue';

const props = defineProps(['product']);
const emit = defineEmits(['addProductToCart']);
const imageId = `image-${props.product.id}`;

// show product details
const navigateToProduct = () => {
    window.location.href = `/product/${props.product.id}`;
};

onMounted(() => {
    document.querySelector("#"+imageId).style.backgroundImage = `url(${props.product.product_image[0].image})`;
});
</script>