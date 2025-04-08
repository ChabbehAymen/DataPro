import { createRouter, createWebHistory } from 'vue-router';
import { navigate } from './utils/utils';

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
        path: '/commande',
        component: () => import('./pages/CommandePage.vue'),
        props: true
    },
    {
        path: '/about',
        component: ""//() => import('./pages/About.vue')
    },

    // ❗️404 route should be the last one
    {
        path: '/:pathMatch(.*)*',
        beforeEnter: () => {
            navigate('/notfound');
        }
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
