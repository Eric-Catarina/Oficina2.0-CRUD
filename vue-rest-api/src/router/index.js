import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '',
      name: 'Index',
      component: () => import('../views/orcamentos/OrcamentoIndex.vue')
    },
    {
      path: '/orcamento',
      name: 'OrcamentoIndex',
      component: () => import('../views/orcamentos/OrcamentoIndex.vue')
    },
    {
      path: '/orcamentos/create',
      name: 'OrcamentoCreate',
      component: () => import('../views/orcamentos/OrcamentoCreate.vue')
    },
    {
      path: '/orcamentos/:id/edit',
      name: 'OrcamentoEdit',
      component: () => import('../views/orcamentos/OrcamentoEdit.vue'),
      props: true
    }
  ]
})

export default router
