<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Shipment from '@/Components/Shipment.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';
import UpdateForm from './Partials/UpdateForm.vue';

const props = defineProps({
    shipment: {
        type: Object
    },
});

const state = reactive({ deleteLoading: 0, showEditForm: false });

const deleteShipment = () => {
    state.deleteLoading = false;

    router.delete(`/shipment/${props.shipment.id}`);
};
</script>

<template>
    <AppLayout title="Shipment">
        <template #header>
            <div class="md:flex md:justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Shipment #{{ shipment.id }}
                </h2>
                <div class="mt-4 md:mt-0">
                    <div v-if="!state.showEditForm">
                        <DangerButton @click="deleteShipment" :class="{ 'opacity-25': state.deleteLoading }"
                            :disabled="state.deleteLoading">
                            Delete
                        </DangerButton>
                        <PrimaryButton class="ml-4" @click="state.showEditForm = true">Update</PrimaryButton>
                    </div>
                    <PrimaryButton class="ml-4" @click="state.showEditForm = false" v-else>Cancel</PrimaryButton>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <UpdateForm :shipment="shipment" v-if="state.showEditForm" />
                <Shipment :shipment="shipment" v-else />
            </div>
        </div>
    </AppLayout>
</template>
