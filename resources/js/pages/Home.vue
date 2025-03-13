/*
*
*/
<template>
    <Header/>
    <SideBar/>
    <div class=" w-full mx-auto my-11 flex flex-wrap gap-5">
        <Product v-for="product in products" :id="product.id" :title="product.title" :desc="product.desc" :price="product.price" :category="product.category"/>
    </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Product from "../components/Product.vue";
import SideBar from "../components/SideBar.vue";
import {ref} from "vue";
const products = ref([]);
try {
    axios.get('./products').then(function (response) {
        products.value = response.data.data; 
    })
} catch (e) {
    console.error('[GET DATA]:: Something Went Wrong');
}
</script>

