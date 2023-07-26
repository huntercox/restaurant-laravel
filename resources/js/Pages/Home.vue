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
		<h1>Home page</h1>
		{{ firstProp }}
	</GuestLayout>
</template>