import { makeMutations } from '../helpers'
import axios from 'axios'

const state = {
  loading: false,
  details: [],
  activities: []
}

const getters = {
  profileDetails: state => state.details || [],
  profileActivities: state => state.activities || []
}

const actions = {
  loadProfile ({ commit }) {
    commit('PROFILE_LOAD_REQUEST')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/profile').then((resp) => {
        commit('PROFILE_LOAD_OK', resp.data)
        resolve(resp)
      }).catch((err) => {
        commit('PROFILE_LOAD_FAIL')
        reject(err)
      })
    })
  },
  updateProfile ({ commit }, data) {
    commit('PROFILE_UPDATE_REQUEST')
    return new Promise((resolve, reject) => {
      axios.put('/api/data/profile', data).then((resp) => {
        commit('PROFILE_UPDATE_OK', resp.data)
        resolve(resp)
      }).catch((err) => {
        commit('PROFILE_UPDATE_FAIL')
        reject(err)
      })
    })
  },
  loadActivities ({ commit }, index) {
    commit('ACTIVITIES_LOAD_REQUEST')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/activities', { params: { p: index } }).then((resp) => {
        commit('ACTIVITIES_LOAD_OK', resp.data)
        resolve(resp)
      }).catch((err) => {
        commit('ACTIVITIES_LOAD_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'PROFILE_LOAD_REQUEST',
    'PROFILE_UPDATE_REQUEST',
    'ACTIVITIES_LOAD_REQUEST'
  ], (state) => {
    state.loading = true
  }),
  ...makeMutations([
    'PROFILE_LOAD_OK',
    'PROFILE_UPDATE_OK'
  ], (state, data) => {
    state.loading = false
    state.details = data.user
  }),
  ACTIVITIES_LOAD_OK (state, data) {
    state.loading = false
    state.activities = data.logs
  },
  ...makeMutations([
    'PROFILE_LOAD_FAIL',
    'PROFILE_UPDATE_FAIL',
    'ACTIVITIES_LOAD_FAIL'
  ], (state) => {
    state.loading = false
  })
}

export default {
  state,
  getters,
  actions,
  mutations
}
