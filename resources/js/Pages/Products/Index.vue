<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['products'], { message: String });
</script>
<template>
	<Head title="Create New Product" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Product</h2>
		</template>

		<div v-for="product in products">
			{{ product.name }}
			{{ product.price }}
		</div>
	</AuthenticatedLayout>
</template>