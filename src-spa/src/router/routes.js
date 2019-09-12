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
import AccessTypes from '../pages/dashboard/access/AccessTypes'
import AccessTypesEdit from '../pages/dashboard/access/AccessTypesEdit'
import Status from '../pages/dashboard/access/Status'
import StatusEdit from '../pages/dashboard/access/StatusEdit'
import RoleAccess from '../pages/dashboard/access/RoleAccess'
import RoleAccessEdit from '../pages/dashboard/access/RoleAccessEdit'
import UserAccess from '../pages/dashboard/access/UserAccess'
import UserAccessEdit from '../pages/dashboard/access/UserAccessEdit'

import EventList from '../pages/dashboard/event/Event'

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
          title: 'Home',
          requiresAuth: true
        }
      },
      {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
          title: 'Profile',
          requiresAuth: true
        }
      },
      {
        path: '/settings',
        name: 'settings',
        component: Settings,
        meta: {
          title: 'Settings',
          requiresAuth: true
        }
      },
      {
        path: '/events/list',
        name: 'events-list',
        component: EventList,
        meta: {
          title: 'Events list',
          requiresAuth: true
        }
      },
      {
        path: '/role-access',
        name: 'role-access',
        component: RoleAccess,
        meta: {
          title: 'Roles list',
          requiresAuth: true
        }
      },
      {
        path: '/role-access/:id',
        name: 'role-access-edit',
        component: RoleAccessEdit,
        meta: {
          title: 'Edit role',
          requiresAuth: true
        }
      },
      {
        path: '/role-access/new',
        name: 'role-access-new',
        component: RoleAccessEdit,
        meta: {
          title: 'Create role',
          requiresAuth: true
        }
      },
      {
        path: '/user-access',
        name: 'user-access',
        component: UserAccess,
        meta: {
          title: 'User permissions',
          requiresAuth: true
        }
      },
      {
        path: '/user-access/edit/:id',
        name: 'user-access-edit',
        component: UserAccessEdit,
        meta: {
          title: 'Edit user permissions',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/access-types',
        name: 'default-table-access-types',
        component: AccessTypes,
        meta: {
          title: 'Access types list',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/access-types/new',
        name: 'default-table-access-types-new',
        component: AccessTypesEdit,
        meta: {
          title: 'Create access type',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/access-types/:id',
        name: 'default-table-access-types-edit',
        component: AccessTypesEdit,
        meta: {
          title: 'Edit access type',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/statuses',
        name: 'default-table-statuses',
        component: Status,
        meta: {
          title: 'User statuses list',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/statuses/new',
        name: 'default-table-statuses-new',
        component: StatusEdit,
        meta: {
          title: 'Create user status',
          requiresAuth: true
        }
      },
      {
        path: '/default-table/statuses/:id',
        name: 'default-table-statuses-edit',
        component: StatusEdit,
        meta: {
          title: 'Edit user status',
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
