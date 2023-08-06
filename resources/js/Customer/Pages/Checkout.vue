<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Cart from '@/Customer/Components/Cart.vue';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';

const page = usePage();

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
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
                        <span class="text-xs font-bold uppercase">{{ item?.item?.name }}</span> <span
                            class="text-sm font-bold">x{{
                                item?.quantity }}</span>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
