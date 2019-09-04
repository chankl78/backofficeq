import { makeMutations } from '../helpers'
import { Cookies } from 'quasar'
import axios from 'axios'

const state = {
  loading: false,
  token: Cookies.get('token') || null,
  menuList: [],
  dashboard: {},
  authenticatedUser: {}
}

const getters = {
  dashboardMenu: state => state.dashboard.menu || []
}

const actions = {
  loadDashboard ({ commit, dispatch }) {
    commit('LOAD_DASHBOARD')
    dispatch('fetchAccessToken')
    return new Promise((resolve, reject) => {
      commit('LOAD_DATA')
      axios.get('/api/data/default').then((response) => {
        if (response.status === 200) {
          commit('LOAD_DASHBOARD_OK', response.data)
          resolve(response)
        }
      }).catch((err) => {
        commit('LOAD_DATA_FAIL')
        reject(err)
      })
    })
  },
  resendVerificationEmail ({ commit }, email) {
    return new Promise((resolve, reject) => {
      axios.get('api/data/email/resend-verification').then((response) => {
        if (response.status === 200) {
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_DASHBOARD',
    'LOAD_DATA',
    'LOAD_USER'
  ], (state) => {
    state.loading = true
  }),
  ...makeMutations([
    'LOAD_DASHBOARD_FAIL',
    'LOAD_DATA_FAIL',
    'LOAD_USER_FAIL'
  ], (state) => {
    state.loading = false
  }),
  LOAD_DASHBOARD_OK (state, data) {
    state.dashboard = data
    state.authenticatedUser = data.user
    state.loading = false
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
