import axios from 'axios'
import { makeMutations } from '../../helpers'

const state = {
  loading: false,
  token: localStorage.getItem('token'),
  users: [],
  user: {}
}

const getters = {
  currentUser: state => state.user || {},
  usersList: state => state.users
}

const actions = {
  loadUsersList ({ commit }, params = {}) {
    commit('LOAD_USERS')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/user/list', { params: params }).then((response) => {
        commit('LOAD_USERS_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_USERS_FAIL')
        reject(err)
      })
    })
  },
  loadUser ({ commit }, params = {}) {
    commit('LOAD_USER')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/user/info', { params: params }).then((response) => {
        commit('LOAD_USER_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_USER_FAIL')
        reject(err)
      })
    })
  },
  updateUser ({ commit }, data) {
    commit('UPDATE_USER')
    return new Promise((resolve, reject) => {
      axios.put('api/data/user/update', data).then((response) => {
        commit('UPDATE_USER_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('UPDATE_USER_FAIL')
        reject(err)
      })
    })
  },
  deleteUser ({ commit }, id) {
    commit('DELETE_USER')
    return new Promise((resolve, reject) => {
      axios.delete('api/data/user/delete', {
        params: {
          id: id
        }
      }).then((response) => {
        commit('DELETE_USER_OK', id)
        resolve(response)
      }).catch((err) => {
        commit('DELETE_USER_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_USERS',
    'LOAD_USER',
    'UPDATE_USER',
    'DELETE_USER'
  ], (state) => {
    state.status = 'loading'
  }),
  ...makeMutations([
    'LOAD_USER_OK',
    'UPDATE_USER_OK'
  ], (state, data) => {
    state.user = data
  }),
  LOAD_USERS_OK (state, data) {
    state.status = 'success'
    state.users = data.map((item) => ({ ...item, rowSelected: 'false' }))
  },
  DELETE_USER_OK (state, id) {
    state.users = state.users.filter((el) => {
      return (el.uniquecode !== id)
    })
  },
  ...makeMutations([
    'LOAD_USERS_FAIL',
    'LOAD_USER_FAIL',
    'UPDATE_USER_FAIL',
    'DELETE_USER_FAIL'
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
