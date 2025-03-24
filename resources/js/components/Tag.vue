<template>
    <div :id="props.id" @click="emit('selectTag', props.id)" class="ml-4 text-xs inline-flex items-center gap-1 font-bold leading-sm uppercase 
        px-3 py-1 cursor-pointer rounded-full text-gray-700 border"
        :class="{ 'hover:!bg-gray-200': props.hover == true, '': props.hover == false, 'bg-gray-200': props.isSelected, 'bg-white': !props.isSelected }">
        <img class="h-5 w-5"
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABJUlEQVR4nO3WoWtCURzF8WOYRZaG0TRM4l8wlobJKKZhkiVZkqWxMkyPJTGJSUyyuDSWxL9Alh4m4zDJyha2lfPakhzOLb8P3PjlHV64XCCEEEIIMqcAfgEczK1cnWNycyt3yTErcyvX5ZiluZW75ZixuZUbccy9uZWbcUzf3Mq9cEzb3B5916c6B4gUd32qk8OgBOAbwA+AE2MrV+Vf+zC3ck2O2ZhbuRbHvJpbuR7HzM2t3B3HZOZW7oljhuZWbsEx1+ZW7o1jrsyt3DvHNMyt3J5jzsytVJnPiy8+N1ytXI1/dGduj1Lc9alOBpHirk91hjC44cem5lbugWMeza3chGMG5lbumWM65lZuzTEX5lZuyzHn5lbuk2Mq5jaEEEII+McfJzrvEfrPlMgAAAAASUVORK5CYII="
            alt="hashtag">
        {{ props.title }}
    </div>
</template>
<script setup>
const props = defineProps(['title', 'id', 'hover', 'isSelected']);
const emit = defineEmits(['selectTag']);

</script>
<style scoped></style>