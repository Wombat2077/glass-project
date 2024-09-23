import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProductsView from '@/views/ProductsView.vue'
import ProductView from '@/views/ProductView.vue'

const routes = [
    {
        path: '/',
        redirect: 'app/'
    },
    {
        path: 'app/',
        name: 'home',
        component: HomeView
    },
    {
        path: 'app/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
    },
    {
        path: 'app/products',
        name: 'products',
        component: ProductsView
    },
    {
        path: 'app/product/:id',
        name: 'product',
        component: ProductView
    }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
