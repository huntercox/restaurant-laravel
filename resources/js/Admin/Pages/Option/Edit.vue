<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps(['option']);

const form = ref({
  name: props.option.name,
  description: props.option.description,
  price: props.option.price / 100,
});

const updateOption = () => {
  router.put(`/admin/options/${props.option.id}`, form.value);
};
</script>

<template>
  <Head><title>Admin: Option - {{ option.name }}</title></Head>

  <AuthenticatedLayout>

    <div class="bg-red-100 py-4 mb-3">
      <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">
        <h1 class="text-xl font-black">Edit Option - {{ option.name }}</h1>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8">
      <form @submit.prevent="updateOption">
        <div>
          <label for="name">Name</label>
          <input type="text" id="name" v-model="form.name" class="block w-full border-gray-300 rounded-md shadow-sm mb-3"/>
        </div>
        <div>
          <label for="description">Description</label>
          <input type="text" id="description" v-model="form.description" class="block w-full border-gray-300 rounded-md shadow-sm mb-3"/>
        </div>
        <div>
          <label for="price">Price</label>
          <input type="text" id="price" v-model="form.price" class="block w-full border-gray-300 rounded-md shadow-sm mb-3"/>
        </div>
        <button type="submit">Update</button>
      </form>
    </div>
  </AuthenticatedLayout>
</template>
