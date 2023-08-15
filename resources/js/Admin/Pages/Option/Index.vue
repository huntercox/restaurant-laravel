<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';

defineProps(['options']);
</script>

<template>
  <Head title="Admin - Options" ></Head>

  <AuthenticatedLayout>

    <div class="bg-red-100 py-4 mb-3">
      <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

        <h1 class="text-xl font-black">Options</h1>

        <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="route('admin.options.create')">
          Create Option</Link>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">

      <div class="flex gap-4 justify-center">
        <template v-if="options === null">
          <p>Sorry, but no options are available at this time.</p>
        </template>
        <template v-if="options.length !== 0">
          <div class="w-full bg-gray-200" v-for="option in options" :key="option.id" :option="option">
            <div class="bg-gray-600 text-white uppercase p-3">
              <p class="font-black">{{ option.name }}</p>
            </div>
          </div>
        </template>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
