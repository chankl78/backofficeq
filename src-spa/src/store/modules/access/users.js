import axios from 'axios'
import { makeMutations } from '../../helpers'

const state = {
  loading: false,
  token: localStorage.getItem('token'),
  users: [],
  user: {},
  availableRoles: [],
  accessTypeList: [],
  availableStatuses: []
}

const getters = {
  currentUser: state => state.user || {},
  usersList: state => state.users,
  availableRoles: state => state.availableRoles,
  accessTypeList: state => state.accessTypeList,
  availableStatuses: state => state.availableStatuses
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
        console.log(data)
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
    'UPDATE_USER_OK'
  ], (state, data) => {
    state.user = data
  }),
  LOAD_USERS_OK (state, data) {
    let _data = Object.values(data)
    state.status = 'success'
    state.users = _data.map((item) => ({
      ...item,
      rowSelected: 'false',
      role: item.roles.map(r => r.description),
      accessType: item.access_types.length ? item.access_types.shift().description : [],
      _status: item.status.length ? item.status[0].description : ''
    }))
  },
  LOAD_USER_OK (state, data) {
    state.status = 'success'
    state.user = data.user
    state.availableRoles = data.roles.map((item) => ({
      id: item.id,
      label: item.description,
      value: item.name,
      permissions: item.permissions.map((p) => ({ id: p.id, name: p.name }))
    }))
    state.accessTypeList = data.accessTypeList.map((item) => ({
      id: item.id,
      label: item.description,
      value: item.name
    }))
    state.statusesList = data.statusesList.map((item) => ({
      id: item.id,
      label: item.description,
      value: item.name
    }))
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
