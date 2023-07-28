<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

</script>

<Head title="Homepage" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">THE Home page</h1>
    </GuestLayout>
</template>
