import LoginLayout from '../layouts/LoginLayout'
import MasterLayout from '../layouts/MasterLayout'
import Login from '../pages/Login'
import Dashboard from '../pages/Dashboard'
import Error404 from '../pages/Error404'

const routes = [
  {
    path: '/login',
    component: LoginLayout,
    children: [{
      path: '',
      component: Login
    }]
  },
  {
    path: '/',
    component: MasterLayout,
    children: [{
      path: '',
      component: Dashboard
    }],
    meta: {
      requiresAuth: true
    }
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: Error404
  })
}

export default routes
