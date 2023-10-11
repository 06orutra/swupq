import { createRouter, createWebHashHistory } from 'vue-router';
import AppLayout from '@/Layouts/AppLayout.vue';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            component: AppLayout,
            children: [
                {
                    path: '/',
                    name: 'dashboard',
                    component: () => import('@/Pages/Dashboard.vue')
                },
                {
                    path: '/home',
                    name: 'home',
                    component: () => import('@/Pages/Componentes/Home/TabMenu.vue'),
                },
                {
                    path:'/institucion',
                    name:'institucion',
                    component:() => import('@/Pages/Componentes/Institucion/institucionAdmin/TabInstitucion.vue'),
                    children: [{
                        path: '/mascotas',
                        name: 'Mascotas',
                        component: () => import('@/Pages/Componentes/Institucion/institucionAdmin/NotaMascotas.vue'),
                        },
                    {
                        path: '/ciclo',
                        name: 'Ciclo',
                        component: () => import('@/Pages/Componentes/Institucion/institucionAdmin/Ciclo.vue'),
                    }]
                },
                {
                    path: '/carreras',
                    name: 'carreras',
                    component: () => import('@/Pages/Dashboard.vue')
                },
                {
                    path: '/posgrado',
                    name: 'posgrado',
                    component: () => import('@/Pages/Dashboard.vue')
                },
                {
                    path: '/noticias',
                    name: 'noticias',
                    component: () => import('@/Pages/Dashboard.vue')
                },
                {
                    path: '/profile',
                    name: 'profile',
                    component: () => import('@/Pages/Profile/Show.vue')
                },
                {
                    path: '/chatbot',
                    name: 'chatbot',
                    component: () => import('@/Pages/Profile/Show.vue')
                },
                {
                    path: '/mascotas',
                    name: 'mascotas',
                    component: () => import('@/Pages/Componentes/Home/TabMenu.vue'),
                    children: [{
                        path: '/menu2',
                        name: 'menu2',
                        component: () => import('@/Pages/Dashboard.vue'),
                    }]

                }
            ]
        },

        {
            path: '/auth/login',
            name: 'login',
            component: () => import('@/views/pages/auth/Login.vue')
        },
        {
            path: '/auth/access',
            name: 'accessDenied',
            component: () => import('@/views/pages/auth/Access.vue')
        },
        {
            path: '/auth/error',
            name: 'error',
            component: () => import('@/views/pages/auth/Error.vue')
        },
    ]
});


export default router;