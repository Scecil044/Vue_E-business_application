<template>
    <div v-if="currentUser.id" class="h-full flex bg-gray-200">
        <!-- sidebar -->
        <Sidebar :class="{ '-ml-[200px]': !sidebarOpen }" />
        <!-- sidebar -->
        <div class="flex-1">
            <TopHeader @toggle-sidebar="toggleSideBar" />
            <main class="p-5">
                <router-view></router-view>
            </main>
        </div>
    </div>
    <div v-else class="min-h-full flex justify-center items-center bg-gray-200">
        <div class="flex flex-col items-center">
            <Spinner />
            <div class="mt-2">
                <span>Please wait</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { LockClosedIcon } from "@heroicons/vue/20/solid";
import Sidebar from "./Sidebar.vue";
import TopHeader from "./TopHeader.vue";
import Spinner from "../components/Spinner.vue";
import store from "../store";

const sidebarOpen = ref(true);

function toggleSideBar() {
    sidebarOpen.value = !sidebarOpen.value;
}

onMounted(() => {
    store.dispatch("getUser");
    handleSidebarSize();
    window.addEventListener("resize", handleSidebarSize);
});
function handleSidebarSize() {
    sidebarOpen.value = window.outerWidth > 768;
}

const currentUser = computed(() => store.state.user.data);
</script>

<style scoped></style>
