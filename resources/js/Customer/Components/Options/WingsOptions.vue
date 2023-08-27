<script setup>
import { inject, computed, defineProps } from 'vue';

const props = defineProps(['groupedOptions']);
const selectedOptions = inject('selectedOptions');
const selectedFlavor = inject('selectedFlavor');
const selectedSize = inject('selectedSize');

// Flavors
const wingsOptions = computed(() => {
  let flavors = [];
  if (props.groupedOptions['Sauces']) {
    flavors = [...flavors, ...props.groupedOptions['Sauces']];
  }
  if (props.groupedOptions['Dry Rubs']) {
    flavors = [...flavors, ...props.groupedOptions['Dry Rubs']];
  }
  return flavors;
});

</script>

<template>
  <div>
    WingsOptions.vue
    <div v-for="(option, category) in groupedOptions" :key="category">
      <h5 class="uppercase font-black">{{ category }}</h5>
      <div v-for="option in option" :key="option.id">
        <label>
          <input
            type="checkbox"
            v-model="selectedOptions[option.id]"
          />
          {{ option.name }} <span class="text-xs italic">(${{ (option.price/100).toFixed(2) }})</span>
        </label>
      </div>
    </div>

  </div>
</template>
