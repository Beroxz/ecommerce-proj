import { createRouter, createWebHistory } from 'vue-router';
import FirstPage from './components/pages/my-new-vue.vue';

const routes = [
    {
        path: '/my-new',
        component: FirstPage
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
