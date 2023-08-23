<script setup>
import { ref, computed, watch } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  options: Array,
  item: Object,
});

const selectedOptions = ref({});

function addCartItemWithSelectedOptions() {
  // You can prepare selected options here
  const optionsPayload = Object.entries(selectedOptions.value)
    .filter(([_, isSelected]) => isSelected)
    .map(([optionId]) => optionId);

  // Post to your server with selected options
  router.post('/cart', {
    item: props.item,
    selected_options: optionsPayload,
  });
}

const groupedOptions = computed(() => {
  return props.item?.options.reduce((groups, option) => {
    const categoryName = option.category.name;
    if (!groups[categoryName]) {
      groups[categoryName] = [];
    }
    groups[categoryName].push(option);
    return groups;
  }, {});
});
const selectedCrust = ref(null);
const selectedSauce = ref(null);

// PRICING
const totalPrice = ref(props.item.price);
const calculateTotalPrice = computed(() => {
  let price = props.item.price; // Start with the base item price

  // Calculate the price from the checkboxes
  for (let optionId in selectedOptions.value) {
    if (selectedOptions.value[optionId]) {
      const option = props.item.options.find(o => o.id === parseInt(optionId));
      if (option && option.price > 0) { // Only add the price if greater than 0
        price += option.price;
      }
    }
  }

  return price; // Return as integer
});

watch(selectedOptions, () => {
  // Calculate the price for each selected option
  let optionsPrice = 0;
  for (let optionId in selectedOptions.value) {
    if (selectedOptions.value[optionId]) {
      const option = props.item.options.find(o => o.id === parseInt(optionId));
      if (option) {
        optionsPrice += option.price;
      }
    }
  }

  // Update the total price with item's base price and options price
  totalPrice.value = props.item.price + optionsPrice;
});

</script>

<template>
  <div>
    <p class="text-md font-semibold">{{ props.item?.name }}</p>
    <p class="block">Total Price: ${{ (calculateTotalPrice/100).toFixed(2) }}</p>
    <p class="text-2xl mb-3">Options </p>
    <div v-for="(options, category) in groupedOptions" :key="category">
      <h3 class="uppercase font-black">{{ category }}</h3> <!-- Category label -->
      <div v-for="option in options" :key="option.id">
        <!-- Render option here -->
        <label>
          <input
            v-if="category === 'Crust'"
            type="radio"
            v-model="selectedCrust"
            :value="option.id"
          />
          <input
            v-else-if="category === 'Sauce'"
            type="radio"
            v-model="selectedSauce"
            :value="option.id"
          />
          <input
            v-else
            type="checkbox"
            v-model="selectedOptions[option.id]"
          />
          {{ option.name }} <span class="text-xs italic">(${{(option.price/100).toFixed(2) }})</span>
        </label>
      </div>
    </div>


    <button @click="addCartItemWithSelectedOptions" class="text-white rounded-sm bg-red-500 py-2 pt-2 mb-2 leading-2 px-2 mt-4 text-sm uppercase font-semibold hover:bg-red-400">Add to Cart</button>
  </div>
</template>
