<template>
    <header class="bg-white shadow-md p-3 flex items-center justify-between">

        <button class="md:hidden text-gray-700 text-2xl p-2 focus:outline-none">
            &#9776;
        </button>
        <!-- Logo -->
        <div class="text-2xl font-bold">
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

    <!-- Navigation Section -->
    <nav class="bg-blue-100 p-3 flex items-center space-x-4">

        <!-- Navigation Links -->
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
</template>

<script setup>

</script>

