<script setup>
import { inject, computed, defineProps } from 'vue';

const props = defineProps(['groupedOptions']);
const selectedOptions = inject('selectedOptions');
const selectedSauce = inject('selectedSauce');
const selectedCrust = inject('selectedCrust');
</script>

<template>
  <div>
    PizzaOptions.vue
    <div v-for="(option, category) in groupedOptions" :key="category">
      <h5 class="uppercase font-black">{{ category }}</h5>
      <div v-for="option in option" :key="option.id" class="grid grid-cols-2 gap-2">
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
