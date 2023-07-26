<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    products: {
        type: Object
    }
});

</script>

<Head title="Menu page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Menu page</h1>
        <div v-for="product in products">
            {{ product.name }}
            {{ product.price }}
        </div>
    </GuestLayout>
</template>
