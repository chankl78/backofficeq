import axios from 'axios'
import { makeMutations } from '../../helpers'

const state = {
  loading: false,
  token: localStorage.getItem('token'),
  statuses: [],
  status: {}
}

const getters = {
  currentStatus: state => state.status || { value: '' },
  statusesList: state => state.statuses
}

const actions = {
  loadStatusesList ({ commit }, params = {}) {
    commit('LOAD_STATUSES')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/statuses', { params: params }).then((response) => {
        commit('LOAD_STATUSES_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_STATUSES_FAIL')
        reject(err)
      })
    })
  },
  loadStatus ({ commit }, params = {}) {
    commit('LOAD_STATUS')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/status', { params: params }).then((response) => {
        commit('LOAD_STATUS_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_STATUS_FAIL')
        reject(err)
      })
    })
  },
  createStatus ({ commit, dispatch }, data) {
    commit('CREATE_STATUS')
    return new Promise((resolve, reject) => {
      axios.post('api/data/status', data).then((response) => {
        commit('CREATE_STATUS_OK')
        dispatch('loadStatusesList')
        resolve(response)
      }).catch((err) => {
        commit('CREATE_STATUS_FAIL')
        reject(err)
      })
    })
  },
  updateStatus ({ commit }, data) {
    commit('UPDATE_STATUS')
    return new Promise((resolve, reject) => {
      axios.put('api/data/status', data).then((response) => {
        commit('UPDATE_STATUS_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('UPDATE_STATUS_FAIL')
        reject(err)
      })
    })
  },
  deleteStatus ({ commit }, id) {
    commit('DELETE_STATUS')
    return new Promise((resolve, reject) => {
      axios.delete('api/data/status', {
        params: {
          id: id
        }
      }).then((response) => {
        commit('DELETE_STATUS_OK', id)
        resolve(response)
      }).catch((err) => {
        commit('DELETE_STATUS_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_STATUSES',
    'LOAD_STATUS',
    'CREATE_STATUS',
    'UPDATE_STATUS',
    'DELETE_STATUS'
  ], (state) => {
    state._status = 'loading'
  }),
  ...makeMutations([
    'LOAD_STATUS_OK',
    'CREATE_STATUS_OK',
    'UPDATE_STATUS_OK'
  ], (state, data) => {
    state.status = data
  }),
  LOAD_STATUSES_OK (state, data) {
    state._status = 'success'
    state.statuses = data.map((item) => ({ ...item, rowSelected: 'false' }))
  },
  DELETE_STATUS_OK (state, id) {
    state.statuses = state.statuses.filter((el) => {
      return (el.id !== id)
    })
  },
  ...makeMutations([
    'LOAD_STATUSES_FAIL',
    'LOAD_STATUS_FAIL',
    'CREATE_STATUS_FAIL',
    'UPDATE_STATUS_FAIL',
    'DELETE_STATUS_FAIL'
  ], (state) => {
    state._status = 'fail'
  })
}

export default {
  state,
  getters,
  actions,
  mutations
}
