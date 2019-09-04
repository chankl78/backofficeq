import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import dashboard from './modules/dashboard'
import profile from './modules/profile'
import roles from './modules/access/roles'
import users from './modules/access/users'
import types from './modules/access/types'
import statuses from './modules/access/statuses'

Vue.use(Vuex)

const Store = new Vuex.Store({
  modules: {
    auth,
    dashboard,
    profile,
    roles,
    users,
    types,
    statuses
  },
  strict: process.env.DEV
})

export default Store
