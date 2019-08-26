import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import dashboard from './modules/dashboard'

Vue.use(Vuex)

const Store = new Vuex.Store({
  modules: {
    auth,
    dashboard
  },
  strict: process.env.DEV
})

export default Store
