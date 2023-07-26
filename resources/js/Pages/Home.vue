<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
	firstProp: {
		type: String
	}
});

</script>

<Head title="Homepage" />
<template>
	<GuestLayout>
		<h1 class="text-xl mb-3">Home page</h1>
		<strong class="font-black bg-slate-200 p-2">{{ firstProp }}</strong>
	</GuestLayout>
</template>