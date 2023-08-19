<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import { computed } from 'vue';

const props = defineProps([
  'item',
  'selectedOptions'
]);

const groupedOptions = computed(() => {
  return props.selectedOptions.reduce((groups, option) => {
    if (!groups[option.category]) {
      groups[option.category] = [];
    }
    groups[option.category].push(option);
    return groups;
  }, {});
});
</script>

<template>
  <Head title="Admin - Item" />

  <AuthenticatedLayout>
    <div class="bg-red-100 py-4 mb-3">
      <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">

        <h1 class="text-xl font-black">Item - {{item.name}}</h1>

        <Link class="rounded-md bg-red-700 p-2 px-4 text-white font-black" :href="`/admin/items/${item.id}/edit`">
          Edit Item</Link>
      </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">

      <div class="flex items-center">
        <span class="w-32 uppercase font-black text-gray-800">Name: </span>
          <p class="ml-4 text-sm">{{ item.name }}</p>
        </div>

      <div class="flex items-center">
        <span class="w-32 uppercase font-black text-gray-800">Description: </span>
            <p class="ml-4 text-sm">{{ item.description }}</p>
      </div>
      <div class="flex items-center">
          <span class="w-32 uppercase font-black text-gray-800">Price: </span>
          <p class="ml-4 text-sm">$ {{ (item.price / 100).toFixed(2) }}</p>
      </div>

        <div v-if="groupedOptions !== null || groupedOptions.length !== 0">
          <div v-for="(options, category) in groupedOptions" :key="category">


            <div class="flex items-start">
              <span class="w-32 uppercase font-black text-gray-800">{{ category }}: </span>
              <ul class="ml-4 mt-1">
                <li v-for="option in options" :key="option.name" class="text-sm">
                  {{ option.name }} - ${{ (option.price / 100).toFixed(2) }}
                </li>
              </ul>
            </div>
          </div>
        </div>

    </div>
  </AuthenticatedLayout>
</template>
