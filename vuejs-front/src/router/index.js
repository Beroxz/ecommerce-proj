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
    }
  ]
})

export default router
