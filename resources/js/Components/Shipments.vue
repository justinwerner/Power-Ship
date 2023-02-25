<script setup>
import { Link } from '@inertiajs/vue3';
import CardLayout from '../Layouts/CardLayout.vue';

defineProps({
    shipments: {
        type: Array,
    },
});

// ! Would normally make this a mixin. But will not for this demo.
const formatDate = (dateString) => {
    const date = new Date(dateString);

    return new Intl.DateTimeFormat('default', { dateStyle: 'long', timeStyle: 'short' }).format(date);
};
</script>

<template>
    <CardLayout>
        <template #title>
            Shipments
        </template>

        <template #description>
            <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Sed odio morbi quis commodo. Nunc sed velit dignissim sodales
                ut eu sem integer. Dui accumsan sit amet nulla facilisi morbi tempus.
            </p>
        </template>

        <div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                <Link v-for="shipment in shipments" :key="shipment.id" :href="`/shipment/${shipment.id}`"
                    class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                        <svg v-if="shipment.type === 'TRUCK'" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 stroke-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>

                        <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 stroke-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-400 dark:text-gray-300">Expected on <b
                            class="text-gray-900 dark:text-white">{{ formatDate(shipment.expected) }}</b></h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        {{ shipment.address_1 }}, {{ shipment.city }}, {{ shipment.state }} {{ shipment.zip }}
                    </p>
                </div>
                </Link>
            </div>
        </div>
    </CardLayout>
</template>
