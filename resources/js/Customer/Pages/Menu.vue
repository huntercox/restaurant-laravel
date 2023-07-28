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
    menuItems: {
        type: Object
    }
});

</script>

<Head title="Menu page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Menu page</h1>

        <div v-for="menuItem in menuItems">
            {{ menuItem.name }}
        </div>
    </GuestLayout>
</template>
