<template>
    <Header @toggleSidebar="handleSideBarVisibility" :isloged="getUser().bool" />
    <SideBar :isopen="isSidebarOpen" @toggleSidebar="handleSideBarVisibility" />
    <div class="container mx-auto p-6 ">
        <h2 class="text-2xl font-bold text-center mb-6">Your Cart ({{ commands.length }} items)</h2>
        
        <div class="border-b pb-4 mb-4" v-for="command in commands">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- <img src="/images/arm-site-img.png" alt="Pi Pizza Oven" class="w-16 h-16 mr-4"> -->
                    <div>
                        <p class="font-bold">{{ command.product.title }}</p>
                        <p class="text-blue-500 font-semibold">{{ adminMessage(command.completed, command.confirmed) }}</p>
                        <p class="text-sm text-gray-600"><b>Ordred On:</b> {{ command.date }}</p>
                        <a @click="()=>{navigate(`/product/${command.product.id}`)}" class="text-blue-500 text-sm">View Product</a>
                    </div>
                </div>
                <p class="text-gray-700">{{ command.product.price }} DT</p>
            </div>
        </div>
        
        <!-- <div class="mt-6">
            <div class="bg-green-100 text-green-700 text-center py-2 mt-4 rounded">
                <p>Congrats, you're eligible for <span class="font-bold">Free Shipping</span></p>
            </div>
            <button class="bg-black text-white w-full py-3 mt-4 font-bold rounded">Check out</button>
        </div> -->
    </div>
</template>

<script setup>
import { fetchCommands } from '../utils/api';
import { navigate, getUser, toggleSidebar } from '../utils/utils';
import { ref, computed } from 'vue';

import Header from '../components/Header.vue';
import SideBar from "../components/SideBar.vue";

const commands = ref([]);
const isSidebarOpen = ref(false);

const adminMessage = (completed, comfirmed)=>{
    if(completed == 1) return "Order Completed"
    if(comfirmed == 1) return "We Will Contact You Soon"
    return "Waiting for Admin Approval"
}

const handleSideBarVisibility = () => {
    toggleSidebar(isSidebarOpen);
};

fetchCommands().then(response => {
    commands.value = response.data;
    console.log(response.data);
});
</script>
