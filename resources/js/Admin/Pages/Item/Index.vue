<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['items']);
</script>

<template>
    <Head title="Admin - Items" />

    <AuthenticatedLayout>
        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Items</h1>

                <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.items.create')">
                Create Item</Link>
            </div>
        </div>


        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
            <div class="flex items-center justify-start gap-2 p-3">
                <div v-for="item in items" :key="item.id" :item="item" class="border border-red-600 p-2 px-3">
                    <p class="font-black text-lg"><Link :href="`/admin/items/${item.id}`" class="text-black hover:text-red-700">{{ item.name }}</Link></p>
                    <p class="text-xs">{{ item.description }}</p>
                    <p class="text-right mt-4 font-bold text-sm">$ {{ (item.price / 100).toFixed(2) }}</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
