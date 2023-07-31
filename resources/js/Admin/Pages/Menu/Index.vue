<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['menus']);
</script>

<template>
    <Head title="Admin - Menus" />

    <AuthenticatedLayout>
        <h1 class="text-xl mb-3">Menus</h1>

        <Link :href="route('admin.menus.create')">Create Menu</Link>

        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
            <div v-for="menu in menus" :key="menu.id" :menu="menu">
                Menu Name: {{ menu.name }}
            </div>
        </div>
    </AuthenticatedLayout>
</template>
