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
});
</script>

<Head title="Homepage" />
<template>
	<GuestLayout :props="firstProp">
		{{ firstProp }}
	</GuestLayout>
</template>