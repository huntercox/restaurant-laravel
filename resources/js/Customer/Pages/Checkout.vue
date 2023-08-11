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

function validateCode(event) {
  couponCode.value = event.target.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase();
}

// Define the couponCode and the validation
const couponError = ref('');
const couponCode = ref('');
const validations = useVuelidate({
  couponCode: { required, minLength: minLength(5), maxLength: maxLength(15) },
}, { couponCode });


function onSuccess(response) {
  // Handle success (e.g., update cart subtotal or show success message)
  couponError.value = '';
  alert('Coupon was applied.')
}

function onError() {
  couponError.value = 'Invalid coupon code';
}

</script>

<Head title="Checkout page" />
<template>
  <GuestLayout>
    <h1 class="text-xl mb-3">Checkout page</h1>

    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col h-full">
        <div v-for="(item, index) in page.props.cartItems" :key="index">
          <div class="px-2 py-2 pb-1 flex justify-between items-center border-b-2 border-gray-400">
            <span class="text-xs font-bold uppercase">{{ item.item.name }}</span> <span class="text-sm font-bold">x{{
              item.quantity }}</span> <span class="text-sm font-bold">${{
    (item.price / 100).toFixed(2) }}</span>
          </div>
        </div>

        <div
          class="border border-t-4 border-gray-500 flex justify-between p-2 mt-5"
          :class="page.props.cart[0]?.coupon_id === 1 ? 'bg-blue-200' : 'bg-orange-300'"
        >
          <span class="text-lg">Subtotal:</span>
          <template v-if="page.props.cart[0]?.sub_total">
            <p v-if="page.props.cart[0]?.coupon_id === 1" class="italic">coupon saved ${{ (page.props.cart[0].discount / 100).toFixed(2) }} ... </p>
            <span class="text-lg font-black">${{ (page.props.cart[0]?.sub_total / 100).toFixed(2) }}</span>

          </template>
        </div>

        <div class="border border-t-4 border-gray-500 flex justify-between p-2 mt-5 bg-red-100">
          <span class="text-lg font-black uppercase">Total:</span>
          <span class="text-lg font-black">${{ (page.props.cart[0]?.total / 100).toFixed(2) }}</span>
        </div>

        <div class="mt-4">
          <label for="couponCode">
            Coupon Code
            <div class="flex items-center">
              <input v-model="couponCode" @input="validateCode" placeholder="Code" type="text" name="couponCode"
                class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
              <Link href="/apply-coupon" method="post" :data="{ code: couponCode }" @success="onSuccess" @error="onError"
                class="ml-2 mb-3 px-4 py-2 bg-gray-200 rounded-md">
              Apply
              </Link>
            </div>
            <span v-if="couponError" class="text-red-500 text-sm">{{ couponError }}</span>
          </label>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
