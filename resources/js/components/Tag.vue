<template>
    <div :id="props.id"
        class="ml-4 text-xs inline-flex items-center gap-2 font-bold leading-sm uppercase px-3 py-1 cursor-pointer rounded-full bg-white text-gray-700 border"
        :class="{ 'hover:!bg-gray-200': props.hover == true, '': props.hover == false }">
        <svg width="18" height="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 48 48" style="enable-background:new 0 0 48 48;" xml:space="preserve">
            <path style="fill:none;stroke:#000000;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" d="M36.5,41.5l-12.5-9l-12.5,9
	v-30c0-2.761,2.239-5,5-5h15c2.761,0,5,2.239,5,5V41.5z" />
        </svg>
        {{ props.title }}
    </div>
</template>
<script setup>
import { computed } from 'vue';

const props = defineProps(['title', 'id', 'hover']);

</script>
<style scoped></style>