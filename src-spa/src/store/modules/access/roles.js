import axios from 'axios'
import { makeMutations } from '../../helpers'

const state = {
  loading: false,
  token: localStorage.getItem('token'),
  roles: [],
  role: {},
  resource: {},
  permissions: [],
  resources: [],
  isEditMode: false
}

const getters = {
  currentRole: state => state.role || { value: '' },
  rolesList: state => state.roles,
  permissionList: state => state.permissions,
  resourcesList: state => state.resources,
  isEditMode: state => state.isEditMode
}

const actions = {
  loadRolesList ({ commit }, params = {}) {
    commit('LOAD_ROLES')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/roles', { params: params }).then((response) => {
        commit('LOAD_ROLES_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_ROLES_FAIL')
        reject(err)
      })
    })
  },
  loadRole ({ commit }, params = {}) {
    commit('LOAD_ROLE')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/role', { params: params }).then((response) => {
        commit('LOAD_ROLE_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_ROLE_FAIL')
        reject(err)
      })
    })
  },
  createRole ({ commit, dispatch }, data) {
    commit('CREATE_ROLE')
    return new Promise((resolve, reject) => {
      axios.post('api/data/role', data).then((response) => {
        commit('CREATE_ROLE_OK')
        dispatch('loadRolesList')
        resolve(response)
      }).catch((err) => {
        commit('CREATE_ROLE_FAIL')
        reject(err)
      })
    })
  },
  updateRole ({ commit }, data) {
    commit('UPDATE_ROLE')
    return new Promise((resolve, reject) => {
      axios.put('api/data/role', data).then((response) => {
        commit('UPDATE_ROLE_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('UPDATE_ROLE_FAIL')
        reject(err)
      })
    })
  },
  deleteRole ({ commit }, id) {
    commit('DELETE_ROLE')
    return new Promise((resolve, reject) => {
      axios.delete('api/data/role', {
        params: {
          id: id
        }
      }).then((response) => {
        commit('DELETE_ROLE_OK', id)
        resolve(response)
      }).catch((err) => {
        commit('DELETE_ROLE_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_ROLES',
    'LOAD_ROLE',
    'CREATE_ROLE',
    'UPDATE_ROLE',
    'DELETE_ROLE'
  ], (state) => {
    state.status = 'loading'
  }),
  ...makeMutations([
    'LOAD_ROLE_OK',
    'CREATE_ROLE_OK',
    'UPDATE_ROLE_OK'
  ], (state, data) => {
    state.role = data
  }),
  LOAD_ROLES_OK (state, data) {
    state.status = 'success'
    state.roles = data.map((item) => ({ ...item, rowSelected: 'false' }))
  },
  LOAD_ROLE_OK (state, data) {
    state.status = 'success'
    state.role = data.role
    state.isEditMode = data.role || false
    state.permissions = data.permissions.map((item) => {
      return {
        label: item.name,
        value: item.name
      }
    })
    let tmp = data.resources.map((item, k) => {
      return {
        id: item.id,
        label: item.resource,
        value: item.code,
        description: item.resourcegroupcode
      }
    })
    state.resources = tmp
  },
  DELETE_ROLE_OK (state, id) {
    state.roles = state.roles.filter((el) => {
      return (el.id !== id)
    })
  },
  ...makeMutations([
    'LOAD_ROLES_FAIL',
    'LOAD_ROLE_FAIL',
    'CREATE_ROLE_FAIL',
    'UPDATE_ROLE_FAIL',
    'DELETE_ROLE_FAIL'
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
