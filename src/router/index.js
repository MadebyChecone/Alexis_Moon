import { createRouter, createWebHistory } from 'vue-router'

// Import tes pages
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/services',
    name: 'services',
    component: () => import('../views/ServicesView.vue'),
  },
  {
    path: '/contact',
    name: 'contact',
    component: () => import('../views/ContactView.vue'),
  },
  {
    path: '/engagements',
    name: 'engagements',
    component: () => import('../views/EngagementView.vue'),
  },
  {
    path: '/devis',
    name: 'devis',
    component: () => import('../views/DevisView.vue'),
  },
  {
    path: '/mentions-legales',
    name: 'mentions-legales',
    component: () => import('../views/MentionsLegalesView.vue'),
  }
  
  
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
