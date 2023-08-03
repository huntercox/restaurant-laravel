<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';

defineProps({
    message: String,
    items: Array,
});
const selectedItemIds = null;

const form = useForm({
    'name': '',
    'item_ids': [],
});
</script>

<template>
    <Head title="Admin - Create new menu" />

    <AuthenticatedLayout>
        <div class="bg-red-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Create New Menu</h1>
            </div>
        </div>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('admin.menus.store'), { onSuccess: () => form.reset() })">
                <label for="name">
                    Menu Name
                    <input v-model="form.name" placeholder="Name" type="text" name="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.name" class="mt-2" />

                    <fieldset>
                        <legend>Select items</legend>
                        <div v-for="item in items" :key="item.id">
                            <input type="checkbox" :id="item.id" :value="item.id" v-model="form.item_ids">
                            <label :for="item.id" class="pl-1">{{ item.name }}</label>
                        </div>
                    </fieldset>
                </label>

                <PrimaryButton class="block mt-10 bg-red-500 text-xl">Add Menu</PrimaryButton>
            </form>
        </div>

    </AuthenticatedLayout>
</template>
