import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '../views/HomePage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: '/home'  // Redirect ไปที่ /home เมื่อเข้าสู่ /
    },
    {
      path: '/home',
      name: 'home',
      component: HomePage
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutPage.vue')
    }
  ]
})

export default router
