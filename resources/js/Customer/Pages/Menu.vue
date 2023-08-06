<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Cart from '@/Customer/Components/Cart.vue';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    menus: {
        type: Object
    },
});
const cart = [];

function addToCart(item) {
    this.cart.push(item);
    console.log(item);
    this.updateCart();
}
function removeFromCart(index) {
    this.cart.splice(index, 1);
    this.updateCart();
}
function updateCart() {
    this.$inertia.post('/cart', { items: this.cart });
}
</script>

<Head title="Menu page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Menu page</h1>

        <div class="max-w-7xl mx-auto">

            <div class="flex flex-col sm:flex-row gap-4 justify-stretch align-start">
                <div class="w-full bg-gray-200 border border-red-600" v-for=" menu in menus" :key="menu.id" :menu="menu">
                    <div class="bg-red-600 text-white uppercase p-3">
                        <p class="font-black">{{ menu.name }}</p>
                    </div>


                    <div class="flex flex-col md:flex-row items-start justify-start gap-2 p-3">
                        <div v-for="item in menu.items" class="border border-gray-400 p-1 px-2 pb-0  w-full">
                            <div class="flex justify-between">
                                <div class="">
                                    <p class="font-black text-lg leading-4 mt-1">{{ item.name }}</p>
                                    <p class="text-xs">{{ item.description }}</p>
                                </div>
                                <p class="text-right font-bold text-xl pt-2 leading-3">$ {{ (item.price / 100).toFixed(2) }}
                                </p>
                            </div>
                            <!-- <button @click="addToCart(item)">Add to Cart</button> -->
                            <div class="flex justify-end">
                                <Link href="/cart" method="post" :data="item" as="button"
                                    class="rounded-sm bg-red-500 py-1 pt-2 mb-2 leading-4 align-middle px-2 my-1 text-sm uppercase font-semibold hover:bg-red-400">
                                Add
                                to Cart</Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
