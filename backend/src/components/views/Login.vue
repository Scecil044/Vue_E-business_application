
<template>
    <GuestLayout title="Sign In to Your Account">
        <form class="mt-8 space-y-6" @submit.prevent="login" method="POST">
            <div v-if="errorMsg" class="flex justify-between items-center py-2 px-3 bg-red-600 text-white rounded">
                {{ errorMsg }}
                <XMarkIcon @click="errorMsg = ''" class="w-5 h-5 rounded-full cursor-pointer hover:bg-black/10" />
            </div>
            <input type="hidden" name="remember" value="true" />
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" required=""
                        class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Email address" v-model="user.email" />
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required=""
                        class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Password" v-model="user.password" />
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        v-model="user.remember" />
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <div class="text-sm">
                    <router-link :to="{ name: 'RequestReset' }"
                        class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your
                        password?</router-link>
                </div>
            </div>

            <div>
                <button type="submit" :disabled="loading"
                    class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    :class="{
                        'cursor-not-allowed': loading,
                        'hover:bg-indigo-500': loading
                    }">
                    <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            aria-hidden="true" />
                    </span>
                    Sign in
                </button>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import { LockClosedIcon, XMarkIcon } from '@heroicons/vue/20/solid'
import GuestLayout from '../GuestLayout.vue'
import { ref } from 'vue'
import store from '../../store';
import { useRouter } from 'vue-router';

const router = useRouter()


let loading = ref(false)
let errorMsg = ref("")

const user = {
    email: '',
    password: '',
    remember: false
}

function login() {
    loading.value = true
    store.dispatch('login', user)
        .then(() => {
            loading.value = false
            router.push({ name: 'app.dashboard' })
        })
        .catch(({ response }) => {
            loading.value = false
            errorMsg.value = response.data.message
        })
}

</script>

<style scoped>

</style>
