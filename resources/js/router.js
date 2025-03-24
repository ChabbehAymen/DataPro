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

];

export default createRouter({
    history: createWebHistory(),
    routes
});
