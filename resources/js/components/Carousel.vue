<!-- 
 
-->
<template>
    <div
        class="header finisher-header flex h-[90vh] my-6 px-5 justify-between items-center text-white text-2xl font-bold ">
        <div class="flex flex-col ">
            <h1 class="text-4xl font-extrabold">High-Quality IT Hardware</h1>
            <p class="text-2xl">PCs, servers, network cables & more</p>
            <button class="bg-white text-black px-3 rounded-2xl self-center text-base ">Shope Now</button>
        </div>
        <div></div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';

onMounted(() => {
    new FinisherHeader({
        "count": 65,
        "size": {
            "min": 2,
            "max": 40,
            "pulse": 0
        },
        "speed": {
            "x": {
                "min": 0,
                "max": 0.8
            },
            "y": {
                "min": 0,
                "max": 0.2
            }
        },
        "colors": {
            "background": "#15182e",
            "particles": [
                "#ff926b",
                "#87ddfe",
                "#acaaff",
                "#1bffc2",
                "#f9a5fe"
            ]
        },
        "blending": "screen",
        "opacity": {
            "center": 1,
            "edge": 0
        },
        "skew": 0,
        "shapes": [
            "c",
            "s",
            "t"
        ]
    });
});

</script>
