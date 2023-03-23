<template>
    <div class="w-[200px] bg-indigo-700 py-4 px-2 text-white transition-all">
        <router-link :to="{ name: 'app.dashboard' }">
            <span class="flex items-center hover:bg-black/30 py-1 px-2 rounded text-xs mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Dashboard
            </span>
        </router-link>

        <router-link :to="{ name: 'app.products' }">
            <span class="flex items-center hover:bg-black/30 py-1 px-2 rounded text-xs mb-2">
                <Bars4Icon class="w-7 mr-2" />
                Products
            </span>
        </router-link>

        <router-link :to="{ name: 'app.users' }">
            <span class="flex items-center hover:bg-black/30 py-1 px-2 rounded text-xs mb-2">
                <UsersIcon class="w-7 mr-2" />
                Users
            </span>
        </router-link>

        <router-link :to="{ name: 'app.reports' }">
            <span class="flex items-center hover:bg-black/30 py-1 px-2 rounded text-xs mb-2">
                <ChartBarIcon class="w-7 mr-2" />
                Reports
            </span>
        </router-link>

    </div>
</template>

<script setup>
import { UsersIcon, ChartBarIcon, Bars4Icon } from '@heroicons/vue/20/solid'


</script>

<style scoped>

</style>
