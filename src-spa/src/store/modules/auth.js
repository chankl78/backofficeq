import axios from 'axios'

const state = {
  status: '',
  token: null,
  user: {}
}

const getters = {
  isLoggedIn: state => !!state.token,
  userCan: state => (perm, strict = true) => {
    let permissions = localStorage.getItem('p')
    if (permissions) {
      permissions = JSON.parse(atob(permissions))
      if (typeof perm === 'string') {
        perm = [perm]
      }
      if (Object.prototype.toString.call(permissions) === '[object Array]') {
        return strict ? perm.every(p => permissions.includes(p)) : perm.some(p => permissions.includes(p))
      }
    }
    return false
  }
}

const actions = {
  login ({ commit }, data) {
    return new Promise((resolve, reject) => {
      commit('AUTH_REQUEST')
      axios.post('/api/auth/login', data).then((response) => {
        if (response.status === 200) {
          const token = response.headers.authorization
          const user = response.data.user
          const roles = response.data.roles
          const permissions = response.data.permissions
          localStorage.setItem('token', token)
          localStorage.setItem('r', btoa(JSON.stringify(roles)))
          localStorage.setItem('p', btoa(JSON.stringify(permissions)))
          commit('AUTH_SUCCESS', token, user)
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  },
  register ({ commit, dispatch }, user) {
    return new Promise((resolve, reject) => {
      commit('AUTH_REQUEST')
      axios.post('/api/auth/register', user).then((response) => {
        if (response.status === 200) {
          dispatch('login', {
            username: user.email,
            password: user.password
          })
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  },
  logout ({ commit }) {
    return new Promise((resolve, reject) => {
      commit('AUTH_LOGOUT')
      localStorage.removeItem('token')
      delete axios.defaults.headers.common['Authorization']
      resolve()
    })
  },
  forgotPassword ({ commit }, email) {
    return new Promise((resolve, reject) => {
      commit('AUTH_REQUEST')
      axios.post('/api/auth/forgot', { 'username': email }).then((response) => {
        if (response.status === 200) {
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  },
  resetPassword ({ commit }, link) {
    return new Promise((resolve, reject) => {
      commit('AUTH_RESET_PASS_REQUEST')
      axios.get(link).then((response) => {
        if (response.status === 200) {
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  },
  verifyEmail ({ commit }, link) {
    return new Promise((resolve, reject) => {
      commit('AUTH_VERIFY_EMAIL_REQUEST')
      axios.get(link).then((response) => {
        if (response.status === 200) {
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        reject(err)
      })
    })
  },
  fetchAccessToken ({ commit }) {
    return new Promise((resolve, reject) => {
      commit('UPDATE_ACCESS_TOKEN')
      resolve(localStorage.getItem('token'))
    })
  }
}

const mutations = {
  AUTH_REQUEST (state) {
    state.status = 'loading'
  },
  AUTH_SUCCESS (state, token, user) {
    state.status = 'success'
    state.token = token
    state.user = user
  },
  AUTH_ERROR (state) {
    state.status = 'error'
    localStorage.removeItem('token')
    localStorage.removeItem('r')
    localStorage.removeItem('p')
  },
  AUTH_LOGOUT (state) {
    state.status = ''
    state.token = null
    state.user = {}
    localStorage.clear()
  },
  AUTH_RESET_PASS_REQUEST (state) {
    state.status = 'loading'
    state.token = null
    state.user = {}
  },
  AUTH_VERIFY_EMAIL_REQUEST (state) {
    state.status = 'loading'
    state.token = null
    state.user = {}
  },
  UPDATE_ACCESS_TOKEN (state, token) {
    state.token = localStorage.getItem('token')
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
