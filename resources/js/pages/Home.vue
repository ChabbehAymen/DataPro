/*
*
*/
<template>
    <Header/>
    <div class=" w-full mx-auto my-11 flex flex-wrap gap-5">
        <Product v-for="product in products" :id="product.id" :title="product.title" :desc="product.desc" :price="product.price" :category="product.category"/>
    </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Product from "../components/Product.vue";
import {ref} from "vue";
const products = ref([]);
try {
    axios.get('./products').then(function (response) { // Rename data into response
        products.value = response.data.data; // Access response.data directly
        console.log(response.data.data); // You can access data directly from response
    })
} catch (e) {
    console.error('[GET DATA]:: Something Went Wrong');
}
</script>

