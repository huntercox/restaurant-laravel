<script setup>
import {useForm, Head, router} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';
import InputError from "@/Customer/Components/InputError.vue";
import {ref, computed} from "vue";

const props = defineProps({
  message: String,
  item: Object,
  existingOptions: Array
});

const form = useForm({
  name: props.item.name,
  description: props.item.description,
  price: props.item.price / 100,
  optionRows: [],
});

const optionRows = ref([{
  options: [], // This will hold the IDs of selected options for this row
  category: null // This will hold the optional category for this row
}]);

const updateItem = () => {
  form.put(`/admin/items/${props.item.id}`);
};
</script>

<template>
  <Head><title>Admin: Edit Item</title></Head>

  <AuthenticatedLayout>
    <div class="bg-red-100 py-4 mb-3">
      <div class="max-w-7xl mx-auto px-4 sm-px-6 lg-px-8 flex justify-between items-center">
        <h1 class="text-xl font-black">Edit Item: {{ item.name }}</h1>
      </div>
    </div>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <form @submit.prevent="updateItem">
        <label for="name">
          Name
          <input v-model="form.name" placeholder="Name" type="text" name="name"
                 class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
          <InputError :message="form.errors?.name" class="mt-2" />
        </label>
        <label for="description">
          Description
          <input v-model="form.description" placeholder="Description" type="text" name="description"
                 class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
          <InputError :message="form.errors?.description" class="mt-2" />
        </label>
        <label for="price">
          Price
          <input v-model="form.price" placeholder="Price" type="text" name="price"
                 class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
          <InputError :message="form.errors?.price" class="mt-2" />
        </label>

        <div>
          <div v-for="(row, rowIndex) in form.optionRows" :key="rowIndex">
            <!-- Options Checkboxes -->
            <div class="flex flex-wrap">
              <div v-for="option in existingOptions" :key="option.id" class="m-2">
                <input
                  type="checkbox"
                  :id="`option-${option.id}-${rowIndex}`"
                  :value="option.id"
                  v-model="row.options"
                  class="mr-2"
                />
                <label :for="`option-${option.id}-${rowIndex}`">{{ option.name }}</label>
              </div>
            </div>

            <!-- Option Category Input -->
            <div class="my-3">
              <label :for="`option-category-${rowIndex}`">Option Category</label>
              <input
                v-model="row.category"
                :id="`option-category-${rowIndex}`"
                type="text"
                placeholder="Enter category"
                class="block w-full border-gray-300 rounded-md shadow-sm mb-3"
              />
            </div>
          </div>

          <!-- Button to Add More Rows -->
          <button @click.prevent="form.optionRows.push({ options: [], category: null })" class="mt-4">Add Option(s)</button>
        </div>
        <PrimaryButton class="block mt-10 bg-red-500 text-xl">Update Item</PrimaryButton>
      </form>
    </div>

  </AuthenticatedLayout>
</template>
