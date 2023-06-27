<script setup>
import AuthenticatedLayout from '@/Layouts/CustomLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue'
import Multiselect from '@vueform/multiselect'

defineProps({
  pizza_sizes: Object,
  pizza_toppings: Object,
  storeUrl: String,
  someText: String
});

const base = ref(0);
const toppings = ref([]);

</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<template>
    <Head title="Create your pizza" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Select the base size and all the toppings</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-visible shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <select v-model="base">
                        <option v-for="(value, key) in pizza_sizes" :key="value" :value="value">
                            {{ key }}
                        </option>
                        </select>

                        <div>
                            <Multiselect
                                v-model="toppings"
                                mode="tags"
                                :close-on-select="false"
                                :searchable="true"
                                :options="pizza_toppings"
                            />
                        </div>

                        <div>Esitamted cost of the order: {{ base + toppings.length }}€</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
