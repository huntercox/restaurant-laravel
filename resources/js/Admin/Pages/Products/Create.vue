<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';


defineProps({
	message: String,
});
const form = useForm({
	name: '',
	price: '',
});
</script>

<template>
	<Head title="Create New Product" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Product</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<form @submit.prevent="form.post(route('products.store'), { onSuccess: () => form.reset() })" class="p-5">
						<label for="name">
							Name
							<input v-model="form.name" placeholder="Name" type="text" name="name"
								class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
							<InputError :message="form.errors.name" class="mt-2" />
						</label>

						<label for="price">
							Price
							<input v-model="form.price" placeholder="price" type="text" name="price"
								class="block w-full border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" />
							<InputError :message="form.errors.price" class="mt-2" />
						</label>

						<PrimaryButton class="block mt-10 bg-red-500 text-2xl">Add Product</PrimaryButton>
					</form>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
