<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AuthenticatedLayout>
        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Admin Dashboard</h1>

            </div>
        </div>


        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
            <div class="mb-4">
                <p>Hello, <strong>{{ $page.props.auth.user.name }}</strong></p>
            </div>

            <div class="flex gap-4">
                <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.items.create')">
                Create Item
                </Link>
                <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.menus.create')">
                Create Menu
                </Link>
            </div>

        </div>

    </AuthenticatedLayout>
</template>
