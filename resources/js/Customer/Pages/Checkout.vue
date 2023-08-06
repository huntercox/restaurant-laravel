<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Cart from '@/Customer/Components/Cart.vue';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';
import { computed } from 'vue';

const page = usePage();

defineProps({
    items: {
        type: Array,
        default: () => [],
    },
});

const subtotal = computed(() => {
    return page.props.cartItems.reduce((total, item) => {
        return total + (item.price);
    }, 0) / 100;
});

function checkout() {
    this.$inertia.post('/checkout')
        .then(response => {
            // Handle success
        })
        .catch(error => {
            // Handle error
        });
}
</script>

<Head title="Checkout page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Checkout page</h1>

        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col h-full">
                <div v-for="(item, index) in page.props.cartItems" :key="index">
                    <div class="px-2 py-2 pb-1 flex justify-between items-center border-b-2 border-gray-400">
                        <span class="text-xs font-bold uppercase">{{ item.item.name }}</span> <span
                            class="text-sm font-bold">x{{
                                item.quantity }}</span> <span class="text-sm font-bold">${{
        (item.price / 100).toFixed(2) }}</span>
                    </div>
                </div>

                <div class="border border-t-4 border-gray-500 flex justify-between p-2 bg-red-100 mt-5">
                    <span class="text-lg">Subtotal:</span>
                    <span class="text-lg font-black">${{ subtotal.toFixed(2) }}</span>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
