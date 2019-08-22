import LoginLayout from '../layouts/LoginLayout'
import MasterLayout from '../layouts/MasterLayout'
import Login from '../pages/Login'
import Dashboard from '../pages/Dashboard'
import Error404 from '../pages/Error404'
import Register from '../pages/Register'
import ResetPassword from '../pages/ResetPassword'
import VerifyEmail from '../pages/VerifyEmail'

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
    path: '/register',
    component: LoginLayout,
    children: [{
      path: '',
      component: Register
    }]
  },
  {
    path: '/reset-password',
    component: LoginLayout,
    children: [{
      path: '',
      component: ResetPassword
    }]
  },
  {
    path: '/verify-email',
    component: LoginLayout,
    children: [{
      path: '',
      component: VerifyEmail
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
