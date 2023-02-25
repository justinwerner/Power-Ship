<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Shipments from '@/Components/Shipments.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import CreateForm from './Shipment/Partials/CreateForm.vue';
import { reactive } from 'vue';

defineProps({
    shipments: {
        type: Array,
        default(_rawProps) {
            return []
        }
    },
});

const state = reactive({ showCreateForm: false });
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="md:flex md:justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
                <div class="mt-4 md:mt-0">
                    <div v-if="!state.showCreateForm">
                        <PrimaryButton class="ml-4" @click="state.showCreateForm = true">Create Shipment</PrimaryButton>
                    </div>
                    <PrimaryButton class="ml-4" @click="state.showCreateForm = false" v-else>Cancel</PrimaryButton>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <CreateForm v-if="state.showCreateForm" />
                <Shipments :shipments="shipments" v-else />
            </div>
        </div>
    </AppLayout>
</template>
