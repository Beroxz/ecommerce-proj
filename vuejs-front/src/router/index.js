import { createRouter, createWebHashHistory  } from 'vue-router'
import HomePage from '../views/HomePage.vue'
import NotFound from '../views/NotFound.vue';

const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/:catchAll(.*)',
      name: 'NotFound',
      component: NotFound
    },
    {
      path: '/',
      redirect: '/home'  // Redirect ไปที่ /home เมื่อเข้าสู่ /
    },
    {
      path: '/login',
      name: 'LoginPage',
      component: () => import('../views/LoginPage.vue')
    },
    {
      path: '/register',
      name: 'RegisterPage',
      component: () => import('../views/RegisterPage.vue')
    },
    {
      path: '/home',
      name: 'HomePage',
      component: HomePage
    },
    {
      path: '/about',
      name: 'AboutPage',
      component: () => import('../views/AboutPage.vue')
    },
    {
      path: '/shop',
      name: 'ShopPage',
      component: () => import('../views/ShopPage.vue')
    },
  ]
})

export default router
