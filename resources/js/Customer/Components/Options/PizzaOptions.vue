<script setup>
import { inject, computed, defineProps } from 'vue';

const props = defineProps(['groupedOptions']);
const selectedOptions = inject('selectedOptions');
const selectedSauce = inject('selectedSauce');
const selectedCrust = inject('selectedCrust');
</script>

<template>
  <div>
    <div v-for="(option, category) in groupedOptions" :key="category">
      <div>
        <h5 class="uppercase font-black bg-red-200 p-1 pl-3 pt-2 mb-2">{{ category }}</h5>
        <div  class="grid grid-cols-2 gap-2 mb-4">
          <div v-for="option in option" :key="option.id">
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
<!--              <input-->
<!--                v-else-if="category === 'Toppings'"-->
<!--                type="checkbox"-->
<!--                v-model="selectedOptions[option.id]"-->
<!--              />-->
              <input
                v-else
                type="checkbox"
                v-model="selectedOptions[option.id]"
              />
              {{ option.name }} <span class="text-xs italic">(${{ (option.price/100).toFixed(2) }})</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
