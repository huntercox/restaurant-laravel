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

  // You might also want to close the modal after this.
}
</script>

<template>
  <div>
    <div v-for="option in options" :key="option.id">
      <!-- Render option here -->
      <label>
        <input type="checkbox" v-model="selectedOptions[option.id]" />
        {{ option.name }} ({{ option.price }})
      </label>
    </div>
    <button @click="addCartItemWithSelectedOptions">Add to Cart</button>
  </div>
</template>
