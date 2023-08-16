<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['option']);
</script>

<template>
  <Head><title>Admin: Option - {{ option.name }}</title></Head>

  <AuthenticatedLayout>

    <div class="bg-red-100 py-4 mb-3">
      <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">
        <h1 class="text-xl font-black">Option - {{ option.name }}</h1>

        <Link :href="`/admin/options/${option.id}/edit`" class="rounded-md bg-red-700 p-2 px-4 text-white font-black">
          Edit Option</Link>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
      <p>Description: {{ option.description }}</p>
      <p>Price: ${{ option.price }}</p>
    </div>
  </AuthenticatedLayout>
</template>
