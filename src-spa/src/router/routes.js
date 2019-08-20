
const routes = [
  {
    path: '/',
    component: () => import('layouts/LoginLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Login') }
    ]
  },
  {
    path: '/Dashboard',
    component: () => import('layouts/MasterLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Dashboard') }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
