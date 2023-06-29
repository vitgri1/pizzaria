<script setup>
import AuthenticatedLayout from '@/Layouts/CustomLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue'

defineProps({
  orders: Object,
  pizza_sizes: Object,
  pizza_toppings: Object,
  storeUrl: String,
});

// const base = ref(0);

</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Your order list</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-visible shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    
                        <ul >
                            <li v-if="orders" v-for="order in orders" class="flex divide-x justify-between">
                                <div>
                                    {{ order.id }}
                                </div>
                                <div>
                                    {{ order.name }}
                                </div>
                                <template v-for="(value, key) in pizza_sizes">
                                    <div v-if="order.base == value">
                                        {{key}}
                                    </div>
                                </template>
                                <template v-for="(top, top_key) in pizza_toppings">
                                    <template v-for="ord in order.toppings">
                                        <div v-if="ord == top_key">
                                            {{ top }}
                                        </div>
                                    </template>
                                </template>
                                
                            </li>
                            <li v-else>
                                You have no orders yet, go order!
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
