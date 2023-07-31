<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';


</script>

<template>
    <Head title="Admin - Menus" />

    <AuthenticatedLayout>
        <h1 class="text-xl mb-3">Menus</h1>

        <Link :href="route('admin.menus.create')">Create Menu</Link>
    </AuthenticatedLayout>
</template>
