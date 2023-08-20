<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const props = defineProps({
  options: Array,
  item: Object,
});

const selectedOptions = ref({});

const { $inertia } = usePage();

function addCartItemWithSelectedOptions() {
  // You can prepare selected options here
  const optionsPayload = Object.entries(selectedOptions.value)
    .filter(([_, isSelected]) => isSelected)
    .map(([optionId]) => optionId);

  // Post to your server with selected options
  $inertia.post('/cart', {
    item: props.item,
    selected_options: optionsPayload,
  });
}
</script>

<template>
  <div>
    <p class="text-md font-semibold">{{ props.item?.name }}</p>
    <p class="text-2xl mb-3 border-2 border-b-gray-900">Options: </p>
    <div v-for="option in props.item?.options" :key="option.id">
      <!-- Render option here -->
      <label>
        <input type="checkbox" v-model="selectedOptions[option.id]" />
        {{ option.name }} ({{ option.price }})
      </label>
    </div>
    <button @click="addCartItemWithSelectedOptions" class="text-white rounded-sm bg-red-500 py-2 pt-2 mb-2 leading-2 px-2 mt-4 text-sm uppercase font-semibold hover:bg-red-400">Add to Cart</button>
  </div>
</template>
