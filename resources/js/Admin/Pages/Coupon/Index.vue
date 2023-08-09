<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps({
    coupons: Object,
});
</script>

<template>
    <Head title="Admin - Coupons" />

    <AuthenticatedLayout>
        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Coupons</h1>

                <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.coupons.create')">
                Create Coupon</Link>
            </div>
        </div>


        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <div class="w-full bg-gray-200 border-gray-400 border-2" v-for="coupon in coupons" :key="coupon.id"
                :coupon="coupon">
                <div class="flex">
                    <div class="m-2 p-3">
                        <p class="font-black">Name: <span class="text-gray-500 uppercase">{{ coupon.name }}</span></p>
                    </div>
                    <div class="m-2 p-3">
                        <p class="font-black">Code: <span class="text-gray-500 uppercase">{{ coupon.code }}</span></p>
                    </div>
                </div>
                <div class="flex">
                    <div class="m-2 p-3">
                        <p class="font-black">Discount: <span class="text-gray-500 uppercase">{{ coupon.discount }}%</span>
                        </p>
                    </div>
                    <div class="m-2 p-3">
                        <p class="font-black">Expiry Date: <span class="text-gray-500 uppercase">{{ coupon.expiry_date
                        }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
