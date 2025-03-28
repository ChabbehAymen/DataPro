<template>
    <div class="container mx-auto p-6 ">
        <h2 class="text-2xl font-bold text-center mb-6">Your Cart (4 items)</h2>
        
        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- <img src="/images/arm-site-img.png" alt="Pi Pizza Oven" class="w-16 h-16 mr-4"> -->
                    <div>
                        <p class="font-bold">Pi Pizza Oven</p>
                        <p class="text-orange-500 font-semibold">(Estimated Ship Date: June 6th)</p>
                        <p class="text-sm text-gray-600">Fuel Source: Wood Only</p>
                        <a href="#" class="text-blue-500 text-sm">Change</a>
                    </div>
                </div>
                <p class="text-gray-700">$469.99</p>
                <div class="flex border px-2 py-1 rounded">
                    <button class="px-2">-</button>
                    <span class="mx-2">1</span>
                    <button class="px-2">+</button>
                </div>
                <p class="text-gray-700">$469.99</p>
            </div>
        </div>

        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- <img src="/images/arm-site-img.png" alt="Grill Ultimate Bundle" class="w-16 h-16 mr-4"> -->
                    <div>
                        <p class="font-bold">Solo Stove Grill Ultimate Bundle</p>
                        <button class="text-orange-500 border border-orange-500 px-2 py-1 rounded text-sm">Add accident protection for $29.99</button>
                    </div>
                </div>
                <p class="text-gray-700">$549.99</p>
                <div class="flex border px-2 py-1 rounded">
                    <button class="px-2">-</button>
                    <span class="mx-2">1</span>
                    <button class="px-2">+</button>
                </div>
                <p class="text-gray-700">$549.99</p>
            </div>
        </div>

        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- <img src="/images/arm-site-img.png" alt="Starters" class="w-16 h-16 mr-4"> -->
                    <div>
                        <p class="font-bold">Solo Stove Starters <span class="text-orange-500">(4 pack)</span></p>
                    </div>
                </div>
                <p class="text-gray-700">$0.00</p>
                <input type="text" value="1" class="w-12 text-center border rounded">
                <p class="text-gray-700">$0.00</p>
            </div>
        </div>
        
        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- <img src="/images/arm-site-img.png" alt="Charcoal Grill Pack" class="w-16 h-16 mr-4"> -->
                    <p class="font-bold">Solo Stove Charcoal Grill Pack</p>
                </div>
                <p class="text-gray-700">$0.00</p>
                <input type="text" value="1" class="w-12 text-center border rounded">
                <p class="text-gray-700">$0.00</p>
            </div>
        </div>
        
        <div class="mt-6">
            <div class="flex justify-end">
                <div>
                    <p class="text-right">Subtotal: <span class="font-bold">$1,019.98</span></p>
                    <p class="text-right">Sales Tax: <span class="font-bold">$102.00</span></p>
                    <p class="text-right">Coupon Code: <a href="#" class="text-blue-500">Add Coupon</a></p>
                    <p class="text-xl font-bold text-right">Grand total: $1,121.98</p>
                </div>
            </div>
            <div class="bg-green-100 text-green-700 text-center py-2 mt-4 rounded">
                <p>Congrats, you're eligible for <span class="font-bold">Free Shipping</span></p>
            </div>
            <button class="bg-black text-white w-full py-3 mt-4 font-bold rounded">Check out</button>
        </div>
    </div>
</template>

<script setup>
</script>
