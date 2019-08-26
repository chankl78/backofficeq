import axios from 'axios'

const state = {
  loading: false,
  token: localStorage.getItem('token'),
  roles: []
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
  }
}

const mutations = {
  LOAD_ROLES (state) {
    state.status = 'loading'
  },
  LOAD_ROLES_OK (state, data) {
    state.status = 'success'
    state.roles = data
  },
  LOAD_ROLES_FAIL (state) {
    state.status = 'fail'
  }
}

export default {
  state,
  actions,
  mutations
}
