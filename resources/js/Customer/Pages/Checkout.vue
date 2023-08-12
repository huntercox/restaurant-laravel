<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Cart from '@/Customer/Components/Cart.vue';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';
import { ref, computed, inject } from 'vue';
import { useVuelidate } from '@vuelidate/core';
import { required, minLength, maxLength } from '@vuelidate/validators';


const page = usePage();

defineProps({
  items: {
    type: Array,
    default: () => [],
  },
  cart: {
    type: Array,
    default: () => [],
  }
});

</script>

<Head title="Checkout page" />
<template>
  <GuestLayout>
    <h1 class="text-2xl mb-3 mt-2 font-black ">Checkout</h1>

    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col h-full">
        <div v-for="(item, index) in page.props.cartItems" :key="index">
          <div class="px-2 py-2 pb-1 flex justify-between items-center border-b-2 border-gray-400">
            <span class="text-xs font-bold uppercase">{{ item.item.name }}</span> <span class="text-sm font-bold">x{{
              item.quantity }}</span> <span class="text-sm font-bold">${{
    (item.price / 100).toFixed(2) }}</span>
          </div>
        </div>

        <div v-if="page.props.cart[0]?.coupon_id === 1" class="flex flex-col h-full">
          <div class="px-2 py-2 pb-1 flex justify-between items-center border-b-2 border-gray-400">
            <span class="text-xs font-bold uppercase text-gray-600">Coupon: {{ page.props.cart[0]?.code }} </span><span> </span><span class="text-sm font-bold text-red-900"> - ${{ (page.props.cart[0].discount / 100).toFixed(2) }}</span>
        </div>
        </div>


        <div class="border border-t-4 border-gray-500 flex justify-between p-2 mt-5 bg-red-100">
          <span class="text-lg font-black uppercase">Total:</span>
          <span class="text-lg font-black">${{ (page.props.cart[0]?.total / 100).toFixed(2) }}</span>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
