<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';
import InputError from "@/Customer/Components/InputError.vue";

defineProps({
    message: String,
});
const form = useForm({
    'name': '',
    'description': '',
    'price': '',
});
</script>

<template>
    <Head><title>Admin: Create New Item</title></Head>

    <AuthenticatedLayout>
        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Create New Item</h1>
            </div>
        </div>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('admin.items.store'), { onSuccess: () => form.reset() })">
                <label for="name">
                    Name
                    <input v-model="form.name" placeholder="Name" type="text" name="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </label>
                <label for="description">
                    Description
                    <input v-model="form.description" placeholder="Description" type="text" name="description"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.description" class="mt-2" />
                </label>
                <label for="price">
                    Price
                    <input v-model="form.price" placeholder="Price" type="text" name="price"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.price" class="mt-2" />
                </label>

                <PrimaryButton class="block mt-10 bg-red-500 text-xl">Add Item</PrimaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>
