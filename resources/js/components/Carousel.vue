<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';
import { Pagination, Autoplay } from 'swiper/modules';

const slides = ref([
    { id: 1, image: '/images/arm-site-img.png'},
    { id: 2, image: '/images/Armoire.jpg'},
    { id: 3, image: '/images/images2.jpg'}
]);
</script>

<template>
  <swiper
    :modules="[Pagination, Autoplay]"  
    :slides-per-view="1"
    :space-between="10"
    :pagination="{ clickable: true }"
    :autoplay="{ delay: 3000 }"
    class="w-[300px] h-[300px]" 
  >
    <swiper-slide v-for="slide in slides" :key="slide.id">
      <div class="relative w-full h-full">
        <img :src="slide.image" alt="Carousel Image" class="w-full h-full object-cover">
      </div>
    </swiper-slide>
  </swiper>
</template>

<style scoped>
/* Removed styles for arrows */
img {
    max-height: 300px;
    object-fit: cover;
}
</style>
