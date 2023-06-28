<script setup>
import AuthenticatedLayout from '@/Layouts/CustomLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue'

defineProps({
  pizza_sizes: Object,
  pizza_toppings: Object,
  storeUrl: String,
  someText: String
});

const base = ref(0);
const topping = ref(0);
const toppings = ref([]);

function deleteTopping (event) {
    const topIdInList = toppings.value.indexOf(event.target.dataset.topId);
    delete toppings.value[topIdInList];
    event.target.parentNode.remove();
}

</script>

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
                        <label for="base-select">Select the size of pizza base</label>
                        <select v-model="base" id="base-select">
                        <option v-for="(value, key) in pizza_sizes" :key="value" :value="value">
                            {{ key }}
                        </option>
                        </select>

                        <div class="flex items-center gap-1">
                            <label for="topping-select">Select additional toppings</label>
                            <select v-model="topping" id="topping-select">
                                <option v-for="(value, key) in pizza_toppings" :key="value" :value="key">
                                    {{ value }}
                                </option>
                            </select>

                            <button
                            @click="
                            topping > 0 && !toppings.includes(topping) ? toppings.push(topping): null; 
                            topping = 0;
                            "
                            class="border rounded border-solid border-black bg-slate-200"
                            >
                                Add an additional topping
                            </button>
                        </div>

                        <p v-if="toppings.length > 0">Added toppings:</p>
                        <ul v-if="toppings.length > 0">
                            <li v-for="top in toppings">
                                <p>{{ pizza_toppings[top] }}</p>
                                <button
                                :data-top-id="top"
                                @click="deleteTopping"
                                class="border rounded border-solid border-black bg-slate-200 px-0.5"
                                >x</button>
                            </li>
                        </ul>
                        <p>Esitamted cost of the order: {{ base + toppings.length }}€</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
