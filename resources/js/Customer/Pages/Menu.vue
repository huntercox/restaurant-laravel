<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import GuestLayout from '@/Customer/Layouts/GuestLayout.vue';
import OptionSelection from '@/Customer/Components/OptionSelection.vue';


defineProps({
	canLogin: {
		type: Boolean,
	},
	canRegister: {
		type: Boolean,
	},
	menus: {
		type: Object
	},
});
const cart = [];

function addToCart(item) {
	this.cart.push(item);
	console.log(item);
	this.updateCart();
}
function removeFromCart(index) {
	this.cart.splice(index, 1);
	this.updateCart();
}
function updateCart() {
	this.$inertia.post('/cart', { items: this.cart });
}

const showOptionsModal = ref(false);
const selectedItem = ref(null);
const selectedMenu = ref(null);
const selectedItemOptions = ref([]);

function orderItem(item, menu) {
  // Show the modal and populate the selected item and options
  showOptionsModal.value = true;
  selectedItem.value = item;
  selectedMenu.value = menu;
  // You might need to fetch or populate the options for the selected item
  selectedItemOptions.value = item.options || [];
}

function closeOptionsModal() {
  // Hide the modal
  showOptionsModal.value = false;
}
</script>


<Head title="Menu page" />

<template>
  <div v-if="showOptionsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur">
    <div class="relative bg-white p-8 rounded-lg shadow-xl">
      <div class="absolute -top-5 -right-5">
        <button @click="closeOptionsModal" class="rounded-full px-4 py-2 text-xs bg-gray-300 hover:bg-gray-400 focus:outline-none">
          X
        </button>
      </div>
      <!-- Content of the modal goes here -->
      <OptionSelection :item="selectedItem" :selectedMenu="selectedMenu" />
    </div>
  </div>

	<GuestLayout>
		<h1 class="text-xl mb-3">Menu page</h1>

		<div class="max-w-7xl mx-auto">
			<div class="grid-cols-1 md:grid-cols-2 grid gap-2">

				<div class="w-full bg-gray-200 border border-red-600" v-for="menu in menus" :key="menu.id" :menu="menu">
					<div class="bg-red-600 text-white uppercase p-3">
						<p class="font-black">{{ menu.name }}</p>
					</div>

					<div class="grid-cols-2 grid gap-2 p-2">
						<div v-for="item in menu.items" class="border border-gray-400 p-1 px-2 pb-0  w-full">
							<div class="grid-cols-2">
								<div class="">
									<p class="font-black text-lg leading-4 mt-1">{{ item.name }}</p>
									<p class="text-xs">{{ item.description }}</p>
								</div>
								<p class="text-right font-bold text-xl py-2 leading-3">$ {{ (item.price / 100).toFixed(2) }}
								</p>
							</div>
							<!-- <button @click="addToCart(item)">Add to Cart</button> -->
							<div class="flex justify-end">
                <button @click="orderItem(item, menu)" class="rounded-sm bg-red-500 py-1 pt-2 mb-2 leading-4 align-middle px-2 my-1 text-sm uppercase font-semibold hover:bg-red-400">Order</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</GuestLayout>
</template>
