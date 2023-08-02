<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['menus']);
</script>

<template>
    <Head title="Admin - Menus" />

    <AuthenticatedLayout>

        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Menus</h1>

                <Link class="rounded-md bg-red-600 p-2" :href="route('admin.menus.create')">Create Menu</Link>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">

            <div class="flex gap-40 justify-center">
                <div class="w-full bg-gray-200 p-3" v-for=" menu in menus" :key="menu.id" :menu="menu">
                    <p class="font-black border-b-2 mb-2 border-b-red-600">{{ menu.name }}</p>

                    <div v-for="item in menu.items">
                        <p>{{ item.name }}</p>
                        <p>{{ item.description }}</p>
                        <p>{{ item.price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
