<template>
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center space-x-6">
            <!-- Profile Picture -->
            <img class="w-24 h-24 rounded-full border-4 border-blue-500" src="https://i.pravatar.cc/150?img=3" alt="Profile">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">John Doe</h1>
                <p class="text-gray-500">Web Developer</p>
                <p class="text-gray-600 mt-2">📍 New York, USA</p>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700">About Me</h2>
            <p class="text-gray-600 mt-2">
                Passionate web developer with expertise in Vue, React, and Laravel. Loves building modern web applications.
            </p>
        </div>

        <!-- Contact & Edit Button -->
        <div class="mt-6 flex justify-between items-center">
            <p class="text-gray-600">📧 john.doe@example.com</p>
            <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">
                Edit Profile
            </button>
        </div>
    </div>
</template>
<script setup> </script>