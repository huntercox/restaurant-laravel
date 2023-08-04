<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    menus: {
        type: Object
    }
});

</script>

<Head title="Menu page" />
<template>
    <GuestLayout>
        <h1 class="text-xl mb-3">Menu page</h1>

        <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">

            <div class="flex gap-4 justify-stretch align-start">
                <div class="w-full bg-gray-200" v-for=" menu in menus" :key="menu.id" :menu="menu">
                    <div class="bg-red-600 text-white uppercase p-3">
                        <p class="font-black">{{ menu.name }}</p>
                    </div>


                    <div class="flex items-start justify-start gap-2 p-3">
                        <div v-for="item in menu.items" class="border border-red-600 p-1 px-2">
                            <p class="font-black text-lg leading-4 mt-1">{{ item.name }}</p>
                            <p class="text-xs">{{ item.description }}</p>
                            <p class="text-right mt-4 font-bold text-sm">$ {{ item.price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
