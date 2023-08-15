<script setup>
import ApplicationLogo from '@/Admin/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header>
        <div>
            <nav class="bg-red-500 border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="h-16">
                        <div class="flex justify-between w-full h-full">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center justify-between">
                                <Link href="/">
                                <ApplicationLogo
                                    class="block w-auto fill-current text-gray-800 hover:scale-125 transition-transform" />
                                </Link>
                            </div>

                            <!-- Utility Nav -->
                            <div
                                class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center bg-gray-200 self-start justify-end">
                                <Link :href="route('admin.dashboard')" :active="route().current('dashboard')"
                                    class="text-gray-900 font-bold px-2 hover:text-gray-700">
                                Login
                                </Link>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</template>
