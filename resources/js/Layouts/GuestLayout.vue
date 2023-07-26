<script setup>
import Header from '@/Components/Header.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
	<Header></Header>
	<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
		<div class="w-full">
			<slot />
		</div>
	</div>
</template>
