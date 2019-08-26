import LoginLayout from '../layouts/LoginLayout'
import MasterLayout from '../layouts/MasterLayout'
import Login from '../pages/Login'
import Error404 from '../pages/Error404'
import Register from '../pages/Register'
import ResetPassword from '../pages/ResetPassword'
import VerifyEmail from '../pages/VerifyEmail'
import NewPassword from '../pages/NewPassword'

import Home from '../pages/dashboard/Home'
import Profile from '../pages/dashboard/Profile'
import Settings from '../pages/dashboard/Settings'
import Roles from '../pages/dashboard/access/Roles'
import AccessTypes from '../pages/dashboard/access/AccessTypes'
import Status from '../pages/dashboard/access/Status'
import RoleAccess from '../pages/dashboard/access/RoleAccess'
import UserAccess from '../pages/dashboard/access/UserAccess'

const routes = [
  {
    path: '/login',
    component: LoginLayout,
    children: [{
      path: '',
      name: 'login',
      component: Login
    }]
  },
  {
    path: '/register',
    component: LoginLayout,
    children: [{
      name: 'register',
      path: '',
      component: Register
    }]
  },
  {
    path: '/reset-password',
    component: LoginLayout,
    children: [{
      name: 'reset-password',
      path: '',
      component: ResetPassword
    }]
  },
  {
    path: '/verify-email',
    component: LoginLayout,
    children: [{
      name: 'verify-email',
      path: '',
      component: VerifyEmail
    }]
  },
  {
    path: '/new-password',
    component: LoginLayout,
    children: [{
      name: 'new-password',
      path: '',
      component: NewPassword
    }]
  },
  {
    path: '/',
    component: MasterLayout,
    children: [
      {
        path: '',
        name: 'home',
        component: Home,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/settings',
        name: 'settings',
        component: Settings,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/role-access',
        name: 'role-access',
        component: RoleAccess,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/user-access',
        name: 'user-access',
        component: UserAccess,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/default-table/access-types',
        name: 'default-table-access-types',
        component: AccessTypes,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/default-table/roles',
        name: 'default-table-roles',
        component: Roles,
        meta: {
          requiresAuth: true
        }
      },
      {
        path: '/default-table/statuses',
        name: 'default-table-statuses',
        component: Status,
        meta: {
          requiresAuth: true
        }
      }
    ],
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
