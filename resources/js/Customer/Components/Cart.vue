<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3'

const page = usePage();

const open = ref(false);

defineProps({
    items: {
        type: Array,
        default: () => [],
    },
});

function toggleOpen() {
    open.value = !open.value;
}

function clearCart() {
    this.$inertia.delete('/cart');
}
</script>

<template>
    <div class="relative">
        <button @click="toggleOpen" class="pl-3">
            Cart 🛒
        </button>
        <div class="absolute z-50 top-11 right-0" v-if="open">
            <div class="bg-white rounded border h-64 w-40">
                <p class="font-bold uppercase text-center py-1 border-b-4 border-gray-900">Cart</p>
                <div class="flex flex-col h-full">
                    <div v-for="(item, index) in page.props.cartItems" :key="index">
                        <div class="px-2 py-2 pb-1 flex justify-between items-center border-b-2 border-gray-400">
                            <span class="text-xs font-bold uppercase">{{ item.item.name }}</span> <span
                                class="text-sm font-bold">x{{
                                    item.quantity }}</span> <span class="text-sm font-bold">${{
        (item.price / 100).toFixed(2) }}</span>
                        </div>
                    </div>
                    <Link href="/cart" method="delete" as="button"
                        class="rounded-sm bg-red-300 p-1 px-2 my-1 text-sm uppercase font-semibold hover:bg-red-400 leading-5 pt-2">
                    Clear Cart</Link>

                    <Link href="/checkout"
                        class="rounded-sm bg-yellow-300 p-1 px-2 my-1 text-sm uppercase font-semibold hover:bg-yellow-400 leading-5 pt-2 text-center">
                    View Cart</Link>
                </div>
            </div>
        </div>
    </div>
</template>
