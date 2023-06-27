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
const total = ref(0);

</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">This is a home page for your order</h2>
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

                        <div>Cost: {{ total }}</div>
                        <ul>
                            <li v-for="item in toppings">
                            {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
