import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('./pages/Home.vue')
    },
    {
        path: '/profile',
        component: () => import('./pages/Profile.vue')
    },

    {
        path: '/product/:id',
        component: () => import('./pages/ProductDetails.vue'),
        props: true
    },
    {
        path: '/about',
        component: ""//() => import('./pages/About.vue')
    },

];

export default createRouter({
    history: createWebHistory(),
    routes
});
