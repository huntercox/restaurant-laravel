<script setup>
import Header from '@/Customer/Components/Header.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Header></Header>
    <!-- Page Heading -->
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header" />
        {{ $page.url }}
        {{ $props }}
    </div>

    <div class="min-h-screen flex p-2 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="w-full">
                <slot />
            </div>
        </div>
    </div>
</template>
