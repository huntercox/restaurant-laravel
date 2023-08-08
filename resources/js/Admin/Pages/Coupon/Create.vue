<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { useVuelidate } from '@vuelidate/core';
import { required, alphaNum } from '@vuelidate/validators';
import AuthenticatedLayout from '@/Admin/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Admin/Components/PrimaryButton.vue';
import InputError from '@/Admin/Components/InputError.vue';

defineProps({
    message: String,
});


const form = useForm({
    'name': '',
    'code': '',
    'discount': '',
    'expiry_date': '',
});

let v$ = useVuelidate({
    code: { required, alphaNum }
}, form)

let code = computed({
    get: () => form.code,
    set: (newVal) => form.code = newVal.toUpperCase()
});

const onSubmit = async () => {
    await v$.$validate();
    if (!v$.$error) {
        // form.post(...)
    }
};

const generateCode = () => {
    const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let code = '';
    for (let i = 0; i < 8; i++) {
        code += charset.charAt(Math.floor(Math.random() * charset.length));
    }
    form.code = code;
};

const handleDiscountInput = (event) => {
    let input = event.target.value;
    // Remove all characters that are not numbers
    input = input.replace(/[^0-9]/g, '');
    // If there are more than two digits, keep only the first two
    if (input.length > 2) {
        input = input.slice(0, 2);
    }
    form.discount = input;
};


</script>

<template>
    <Head title="Admin - Create new coupon" />

    <AuthenticatedLayout>
        <div class="bg-blue-100 py-4 mb-3">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">

                <h1 class="text-xl font-black">Create New Coupon</h1>
            </div>
        </div>

        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('admin.coupons.store'), { onSuccess: () => form.reset() })">
                <label for="name">
                    Coupon Name
                    <input v-model="form.name" placeholder="Name" type="text" name="name"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </label>

                <label for="code">
                    Coupon Code
                    <div class="flex items-center">
                        <input v-model="form.code"
                            @input="form.code = $event.target.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase()"
                            placeholder="Code" type="text" name="code"
                            class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />

                        <button type="button" @click="generateCode"
                            class="ml-2 mb-3 px-4 py-2 bg-gray-200 rounded-md">Generate</button>
                    </div>
                    <span v-if="v$.code.$error" class="text-red-500 text-sm">Please enter a valid code.</span>
                </label>


                <label for="discount">
                    Discount Amount
                    <input v-model="form.discount" @input="handleDiscountInput" placeholder="Discount" type="text"
                        name="discount" class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />

                    <InputError :message="form.errors.discount" class="mt-2" />
                </label>

                <label for="expiry_date">
                    Expiry Date
                    <input v-model="form.expiry_date" placeholder="YYYY-MM-DD" type="date" name="expiry_date"
                        class="block w-full border-gray-300 rounded-md shadow-sm mb-3" />
                    <InputError :message="form.errors.expiry_date" class="mt-2" />
                </label>

                <PrimaryButton class="block mt-10 bg-blue-500 text-xl">Add Coupon</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
