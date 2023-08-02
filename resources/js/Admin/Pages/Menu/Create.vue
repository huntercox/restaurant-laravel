<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';

defineProps({
    message: String,
    items: Array,
});
const selectedItem = null;

const form = useForm({
    'name': '',
});
</script>

<template>
    <Head title="Admin - Create new menu" />

    <AuthenticatedLayout>
        <h1 class="text-xl mb-3">Create New Menu</h1>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('admin.menus.store'), { onSuccess: () => form.reset() })">
                <label for="name">
                    Name
                    <input v-model="form.name" placeholder="Name" type="text" name="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.name" class="mt-2" />

                    <fieldset>
                        <legend>Select items</legend>
                        <div v-for="item in items" :key="item.id">
                            <input type="checkbox" :id="item.id" :value="item" v-model="selectedItems">
                            <label :for="item.id" class="pl-1">{{ item.name }}</label>
                        </div>
                    </fieldset>
                </label>

                <PrimaryButton class="block mt-10 bg-red-500 text-xl">Add Menu</PrimaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>
