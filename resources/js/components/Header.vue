<template>
    <div class="flex h-screen flex-col">
        <!-- Navbar (Always Visible) -->
        <header class="bg-white shadow-md p-3 flex items-center justify-between md:pl-4">
            <!-- Mobile Sidebar Toggle Button -->
            <button @click="toggleSidebar" class="md:hidden text-gray-700 text-2xl p-2 focus:outline-none">
                &#9776;
            </button>

            <!-- Logo -->
            <div class="text-2xl font-bold ml-6">
                <span class="text-red-600">WD</span><span class="text-blue-600">LINK</span>
            </div>

            <!-- Search Bar -->
            <div class="relative w-full max-w-md">
                <input
                    type="text"
                    placeholder="Search for products"
                    class="w-full pl-4 pr-12 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-600">
                    🔍
                </button>
            </div>
        </header>

        <!-- Navigation Bar -->
        <nav class="bg-blue-100 p-3 flex items-center space-x-4">
            <div class="hidden md:flex space-x-6 text-gray-800">
                <a href="#" class="flex items-center space-x-1">
                    🏪 <span>Point De Vente</span>
                </a>
                <a href="#" class="flex items-center space-x-1">
                    🛡️ <span>Accès & Présence</span>
                </a>
                <a href="#" class="flex items-center space-x-1">
                    💻 <span>Informatique</span>
                </a>
                <a href="#" class="flex items-center space-x-1">
                    🔋 <span>Alimentation</span>
                </a>
                <a href="#" class="flex items-center space-x-1">
                    🎛️ <span>Câbles & Cordons</span>
                </a>
                <a href="#" class="flex items-center space-x-1">
                    ⚓ <span>Centre De Téléchargement</span>
                </a>
            </div>
        </nav>

        <div class="flex flex-1 md-top-1">
            <!-- Sidebar -->
            <aside
                class="bg-white w-64 h-full top-1 fixed left-0 shadow-md transition-transform duration-300 ease-in-out transform md:-translate-x-56 md:hover:translate-x-0"
                :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full md:-translate-x-56'"
            >
                <div class="p-5 flex justify-between items-center border-b">
                    <div class="text-2xl font-bold ml-6">
                        <span class="text-red-600">WD</span><span class="text-blue-600">LINK</span>
                    </div>
                    <button @click="toggleSidebar" class="md:hidden text-gray-700 text-2xl focus:outline-none">
                        &times;
                    </button>
                </div>
                <nav class="flex flex-col p-4 space-y-4">
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        🏪 <span>Point De Vente</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        🛡️ <span>Accès & Présence</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        💻 <span>Informatique</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        🔋 <span>Alimentation</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        🎛️ <span>Câbles & Cordons</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 text-gray-700 hover:text-blue-500">
                        ⚓ <span>Centre De Téléchargement</span>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 p-6 transition-all duration-300 md:ml-16">
                <h1 class="text-2xl font-semibold">Welcome to WDLink</h1>
                <p class="text-gray-600 mt-2">This is your main content area.</p>
            </div>
        </div>

        <!-- Overlay for mobile -->
        <div
            v-if="isSidebarOpen"
            class="fixed inset-0 md:hidden"
            @click="toggleSidebar"
        ></div>
    </div>
</template>

<script setup>
import { ref } from "vue";

// Sidebar state
const isSidebarOpen = ref(false);

// Function to toggle sidebar
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};
</script>
