<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    address_1: '',
    address_2: '',
    city: '',
    state: '',
    zip: '',
    type: 'TRUCK',
    expected: new Date(),
});

const createShipment = () => {
    form.post(route('shipment.store'), {
        errorBag: 'updateShipment',
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <FormSection @submitted="createShipment">
        <template #title>
            Create Shipment
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="address_1" value="Address 1" />
                <TextInput id="address_1" ref="Address_1_Input" v-model="form.address_1" type="text"
                    class="mt-1 block w-full" />
                <InputError :message="form.errors.address_1" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="address_2" value="Address 2" />
                <TextInput id="address_2" ref="Address_2_Input" v-model="form.address_2" type="text"
                    class="mt-1 block w-full" />
                <InputError :message="form.errors.address_2" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="city" value="City" />
                <TextInput id="city" ref="City_Input" v-model="form.city" type="text" class="mt-1 block w-full" />
                <InputError :message="form.errors.city" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="state" value="State" />
                <TextInput id="state" ref="State_Input" v-model="form.state" type="text" class="mt-1 block w-full" />
                <InputError :message="form.errors.state" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="zip" value="Zip" />
                <input id="zip" ref="Zip_Input" v-model="form.zip" type="number"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <InputError :message="form.errors.zip" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="type" value="Type" />
                <select id="type" ref="Type_Input"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                    v-model="form.type">
                    <option>TRUCK</option>
                    <option>PLANE</option>
                </select>
                <InputError :message="form.errors.type" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="expected" value="Expected" />
                <input id="expected" ref="Expected_Input" type="date"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                    v-model="form.expected" />
                <InputError :message="form.errors.expected" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
