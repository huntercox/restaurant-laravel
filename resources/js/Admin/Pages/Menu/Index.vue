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

                <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.menus.create')">
                Create Menu</Link>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">

            <div class="flex gap-4 justify-center">
                <div class="w-full bg-gray-200" v-for=" menu in menus" :key="menu.id" :menu="menu">
                    <div class="bg-red-600 text-white uppercase p-3">
                        <p class="font-black">{{ menu.name }}</p>
                    </div>


                    <div class="flex items-center justify-start gap-2 p-3">
                        <div v-for="item in menu.items" class="border border-red-600 p-2 px-3">
                            <p class="font-black text-lg">{{ item.name }}</p>
                            <p class="text-xs">{{ item.description }}</p>
                            <p class="text-right mt-4 font-bold text-sm">$ {{ item.price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
