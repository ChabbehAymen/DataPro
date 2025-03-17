/*
*
*/
<template>
    <Header :toggleSidebar="toggleSidebar" @toggleSidebar="toggleSidebar" />
    <SideBar :isopen="isSidebarOpen" @toggleSidebar="toggleSidebar" />
    <Carousel />
    <div class="w-full px-[4%] my-11 flex">
        <Tag v-for="tag in tags" :title="tag.title" :id="tag.id" :key="tag.id"/>
    </div>
    <div class=" mx-[4%] my-11 flex flex-wrap gap-2">
        <Product v-for="product in products" :id="product.id" :title="product.title" :desc="product.desc"
            :price="product.price" :category="product.category" />
    </div>
    <Footer />
</template>

<script setup>
import Header from "../components/Header.vue";
import Product from "../components/Product.vue";
import SideBar from "../components/SideBar.vue";
import Carousel from "../components/Carousel.vue";
import Tag from "../components/Tag.vue";
import Footer from "../components/Footer.vue";
import { onMounted, ref } from "vue";
import axios from "axios";

const products = ref([]);
const tags = ref([]);
const isSidebarOpen = ref(false);

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

onMounted(() => {
    getProducts();
    getTags();
});

const getTags = async () => {
    try {
        axios.get('/tags').then(function (response) {
            tags.value = response.data;
        });
    } catch (e) {
        console.error('[GET DATA]:: Something Went Wrong', e);
    }
};

const getProducts = async () => {
    try {
        axios.get('./products').then(function (response) {
            products.value = response.data.data;
        })
    } catch (e) {
        console.error('[GET DATA]:: Something Went Wrong', e);
    }
};

</script>
