import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import dashboard from './modules/dashboard'
import roles from './modules/access/roles'
import users from './modules/access/users'
import types from './modules/access/types'

Vue.use(Vuex)

const Store = new Vuex.Store({
  modules: {
    auth,
    dashboard,
    roles,
    users,
    types
  },
  strict: process.env.DEV
})

export default Store
