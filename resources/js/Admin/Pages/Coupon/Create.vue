<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';

defineProps({
    message: String,
});

const form = useForm({
    'name': '',
    'code': '',
    'discount': '',
    'expiry_date': '',
});
</script>

<template>
    <Head title="Admin - Create new coupon" />

    <AuthenticatedLayout>
        <div class="bg-blue-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Create New Coupon</h1>
            </div>
        </div>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('admin.coupons.store'), { onSuccess: () => form.reset() })">
                <label for="name">
                    Coupon Name
                    <input v-model="form.name" placeholder="Name" type="text" name="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </label>

                <label for="code">
                    Coupon Code
                    <input v-model="form.code" placeholder="Code" type="text" name="code"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.code" class="mt-2" />
                </label>

                <label for="discount">
                    Discount Amount
                    <input v-model="form.discount" placeholder="Discount" type="text" name="discount"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.discount" class="mt-2" />
                </label>

                <label for="expiry_date">
                    Expiry Date
                    <input v-model="form.expiry_date" placeholder="YYYY-MM-DD" type="date" name="expiry_date"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.expiry_date" class="mt-2" />
                </label>

                <PrimaryButton class="block mt-10 bg-blue-500 text-xl">Add Coupon</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
