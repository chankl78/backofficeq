import { makeMutations } from '../../helpers'
import { Cookies } from 'quasar'
import axios from 'axios'

const state = {
  loading: false,
  token: Cookies.get('token') || null,
  types: [],
  type: {},
  isTypeEditMode: false
}

const getters = {
  currentType: state => state.type || { value: '' },
  typesList: state => state.types,
  isTypeEditMode: state => state.isTypeEditMode
}

const actions = {
  loadTypesList ({ commit }, params = {}) {
    commit('LOAD_TYPES')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/types', { params: params }).then((response) => {
        commit('LOAD_TYPES_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_TYPES_FAIL')
        reject(err)
      })
    })
  },
  loadType ({ commit }, params = {}) {
    commit('LOAD_TYPE')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/type', { params: params }).then((response) => {
        commit('LOAD_TYPE_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_TYPE_FAIL')
        reject(err)
      })
    })
  },
  createType ({ commit, dispatch }, data) {
    commit('CREATE_TYPE')
    return new Promise((resolve, reject) => {
      axios.post('api/data/type', data).then((response) => {
        commit('CREATE_TYPE_OK')
        dispatch('loadTypesList')
        resolve(response)
      }).catch((err) => {
        commit('CREATE_TYPE_FAIL')
        reject(err)
      })
    })
  },
  updateType ({ commit }, data) {
    commit('UPDATE_TYPE')
    return new Promise((resolve, reject) => {
      axios.put('api/data/type', data).then((response) => {
        commit('UPDATE_TYPE_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('UPDATE_TYPE_FAIL')
        reject(err)
      })
    })
  },
  deleteType ({ commit }, id) {
    commit('DELETE_TYPE')
    return new Promise((resolve, reject) => {
      axios.delete('api/data/type', {
        params: {
          id: id
        }
      }).then((response) => {
        commit('DELETE_TYPE_OK', id)
        resolve(response)
      }).catch((err) => {
        commit('DELETE_TYPE_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_TYPES',
    'LOAD_TYPE',
    'CREATE_TYPE',
    'UPDATE_TYPE',
    'DELETE_TYPE'
  ], (state) => {
    state.status = 'loading'
  }),
  ...makeMutations([
    'CREATE_TYPE_OK',
    'UPDATE_TYPE_OK'
  ], (state, data) => {
    state.type = data
  }),
  LOAD_TYPES_OK (state, data) {
    state.status = 'success'
    state.types = data.map((item) => ({ ...item, rowSelected: 'false' }))
  },
  LOAD_TYPE_OK (state, data) {
    state.status = 'success'
    state.type = data.type
    state.isTypeEditMode = data.type || false
  },
  DELETE_TYPE_OK (state, id) {
    state.types = state.types.filter((el) => {
      return (el.id !== id)
    })
  },
  ...makeMutations([
    'LOAD_TYPES_FAIL',
    'LOAD_TYPE_FAIL',
    'CREATE_TYPE_FAIL',
    'UPDATE_TYPE_FAIL',
    'DELETE_TYPE_FAIL'
  ], (state) => {
    state.status = 'fail'
  })
}

export default {
  state,
  getters,
  actions,
  mutations
}
