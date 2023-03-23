<template>
    <div class="h-full flex items-center justify-center gap-3">
        <div class="border-r border-gray-500">
            <h1 class="text-7xl font-bold text-indigo-700 pb-8 px-5">404</h1>
        </div>
        <div>
            <h1 class="text-black text-5xl font-bold mb-2">Page not found</h1>
            <h3 class="text-gray-400 font-bold">Please check the URL in the address and retry</h3>

            <div class="flex gap-5 mt-4">
                <router-link :to="{ name: 'app.dashboard' }"
                    class="py-2 px-3 bg-indigo-700 text-white hover:bg-indigo-600 transition-colors rounded">Go
                    back
                    Home</router-link>
                <button
                    class="py-2 px-3 bg-indigo-100 text-indigo-700 hover:bg-indigo-200 transition-colors rounded">Refresh</button>
            </div>
        </div>

    </div>
</template>

<script setup>

</script>

<style scoped>

</style>
