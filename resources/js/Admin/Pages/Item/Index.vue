<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['items']);
</script>

<template>
    <Head title="Admin - Items" />

    <AuthenticatedLayout>
        <h1 class="text-xl mb-3">Items</h1>

        <Link :href="route('admin.items.create')">Create Item</Link>

        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
            <div v-for="item in items" :key="item.id" :item="item">
                Item Name: {{ item.name }}
            </div>
        </div>
    </AuthenticatedLayout>
</template>
