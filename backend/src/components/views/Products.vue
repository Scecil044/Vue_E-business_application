<template>
    <div>
        <div class="flex items-center justify-between mb-3">
            <h1 class="text-3xl font-semibold">Products</h1>
            <button
                class="flex justify-center py-2 px-3 bg-indigo-500 hover:bg-indigo-600 text-white border-transparent"
            >
                Add New Product
            </button>
        </div>
        <!-- card -->
        <div class="bg-white rounded-lg p-4 shadow">
            <div class="flex justify-between border-b-2 pb-3">
                <div class="flex items-center">
                    <span class="mr-3 whitespace-nowrap">Per Page</span>
                    <select
                        @change="getProduct(null)"
                        v-model="perPage"
                        class="placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm focus:z-10"
                    >
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div>
                    <input
                        type="text"
                        v-model="search"
                        @change="getProduct(null)"
                        placeholder="Type to search product"
                    />
                </div>
            </div>
            <Spinner v-if="products.loading" />
            <template v-else>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border-b-2 p-2 text-left">Id</th>
                            <th class="border-b-2 p-2 text-left">Image</th>
                            <th class="border-b-2 p-2 text-left">Title</th>
                            <th class="border-b-2 p-2 text-left">Price</th>
                            <th class="border-b-2 p-2 text-left">
                                Last Updated At
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="product of products.data" :key="product.id">
                            <td class="border-b-2 p-2">{{ product.id }}</td>
                            <td class="border-b-3 p-2">
                                <img
                                    class="w-6"
                                    :src="product.image"
                                    alt="product.title"
                                />
                            </td>
                            <td
                                class="border-b-2 p-2 whitespace-nowrap overflow-hidden max-w-[200px] text-ellipsis"
                            >
                                {{ product.title }}
                            </td>
                            <td class="border-b-2 p-2">{{ product.price }}</td>
                            <td class="border-b-2 p-2">
                                {{ product.updated_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </template>
        </div>
        <!-- End card -->
    </div>
</template>

<script setup>
import Spinner from "../Spinner.vue";
import { ref, computed, onMounted } from "vue";
import store from "../../store";

const perPage = ref(10);
const search = ref("");
const products = computed(() => store.state.products);

onMounted(() => {
    getProducts();
});

function getProducts() {
    store.dispatch("getProducts");
}
</script>

<style scoped></style>
