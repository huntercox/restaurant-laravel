<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <h1 class="text-xl mb-3">Admin Dashboard</h1>
    </AuthenticatedLayout>
</template>
