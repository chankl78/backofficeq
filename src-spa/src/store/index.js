import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import dashboard from './modules/dashboard'
import roles from './modules/access/roles'

Vue.use(Vuex)

const Store = new Vuex.Store({
  modules: {
    auth,
    dashboard,
    roles
  },
  strict: process.env.DEV
})

export default Store
