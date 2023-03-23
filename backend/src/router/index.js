import { createRouter, createWebHistory } from 'vue-router'
import Login from '../components/views/Login.vue'
import Dashboard from '../components/views/Dashboard.vue'
import RequestReset from '../components/views/RequestReset.vue'
import ResetPassword from '../components/views/ResetPassword.vue'
import AppLayout from '../components/AppLayout.vue'
import Users from '../components/views/Users.vue'
import Reports from '../components/views/Reports.vue'
import Products from '../components/views/Products.vue'
import NotFound from '../components/views/NotFound.vue'
import store from '../store'

const routes = [
    {
        path: '/app',
        name: 'app',
        component: AppLayout,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: 'dashboard',
                name: 'app.dashboard',
                component: Dashboard
            },
            {
                path: 'users',
                name: 'app.users',
                component: Users
            },
            {
                path: 'reports',
                name: 'app.reports',
                component: Reports
            },
            {
                path: 'products',
                name: 'app.products',
                component: Products
            },
        ]
    },

    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/request-reset',
        name: 'RequestReset',
        component: RequestReset
    },
    {
        path: '/reset-password/:token',
        name: 'ResetPassword',
        component: ResetPassword,
        meta: {
            requestGuest: true
        }
    },
    {
        path: '/:PathMatch(.*)',
        name: 'notFound',
        component: NotFound,
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, after, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: 'login' })
    } else {
        next()
    }
})

export default router
