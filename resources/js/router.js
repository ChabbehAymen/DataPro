import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('./pages/Home.vue')
    },
    {
        path:'/login',
        name:'Login',
        component:()=>import('./pages/Login.vue'),
    },
    {
        path:'/register',
        name:'Register',
        component:()=>import('./pages/Register.vue'),
    }

];

export default createRouter({
    history: createWebHistory(),
    routes
});
