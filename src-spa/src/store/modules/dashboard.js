import { makeMutations } from '../helpers'
import axios from 'axios'

const state = {
  loading: false,
  menuList: [],
  dashboard: {}
}

const actions = {
  stopLoading ({ commit }) {
    commit('STOP_LOADING')
  },
  loadDashboard ({ commit, dispatch }) {
    commit('LOAD_DASHBOARD')
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
    'STOP_LOADING',
    'LOAD_DASHBOARD_FAIL',
    'LOAD_DATA_FAIL',
    'LOAD_USER_FAIL'
  ], (state) => {
    state.loading = false
  }),
  LOAD_DASHBOARD_OK (state, data) {
    state.dashboard = data
    state.loading = false
  }
}

export default {
  state,
  actions,
  mutations
}
