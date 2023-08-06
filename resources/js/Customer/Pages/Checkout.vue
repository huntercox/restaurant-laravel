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
    cartItems: {
        type: Object
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

<Head title="Menu page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Checkout page</h1>

        <div class="max-w-7xl mx-auto">

        </div>
    </GuestLayout>
</template>
