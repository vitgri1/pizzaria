<script setup>
import AuthenticatedLayout from '@/Layouts/CustomLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue'

defineProps({
  pizza_sizes: Object,
  pizza_toppings: Object,
  storeUrl: String,
});

const base = ref(0);
const topping = ref(0);
const toppings = ref({});

function addTopping (topping, toppings, pizza_toppings) {
    console.log(topping);
    if (topping != 0) {
        toppings[topping] = pizza_toppings[topping];
        delete pizza_toppings[topping];
    }
    return 0;
}

function deleteTopping (pizza_toppings, event) {
    pizza_toppings[event.target.dataset.topId] = event.target.dataset.top;
    delete toppings.value[event.target.dataset.topId];
}

function makeOrder (storeUrl) {
    router.post(storeUrl, 
    {
        toppings: toppings.value,
        base: base.value,
        name: 'jonas'
    },
    )
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
                            @click="topping = addTopping(topping, toppings, pizza_toppings)"
                            class="border rounded border-solid border-black bg-slate-200"
                            >
                                Add an additional topping
                            </button>
                        </div>

                        <p v-if="Object.keys(toppings).length > 0">Added toppings:</p>
                        <ul v-if="Object.keys(toppings).length > 0">
                            <li v-for="(top, topId) in toppings">
                                <p>{{ top }}</p>
                                <button
                                :data-top="top"
                                :data-top-id="topId"
                                @click="deleteTopping(pizza_toppings, $event)"
                                class="border rounded border-solid border-black bg-slate-200 px-0.5"
                                >x</button>
                            </li>
                        </ul>
                        <p>Esitamted cost of the order: {{ base + Object.keys(toppings).length }}€</p>
                    </div>
                    <div class="p-6">
                        <button 
                        class="float-right"
                        @click="makeOrder(storeUrl)"
                        >
                            Make order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
