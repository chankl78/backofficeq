import axios from 'axios'

const state = {
  status: '',
  token: null, // localStorage.getItem('token'),
  user: {}
}

const getters = {
  isLoggedIn: state => !!state.token
}

const actions = {
  login ({ commit }, data) {
    return new Promise((resolve, reject) => {
      commit('AUTH_REQUEST')
      axios.post('/api/auth/login', data).then((response) => {
        if (response.status === 200) {
          const token = response.headers.authorization
          const user = response.data.user
          localStorage.setItem('token', token)
          commit('AUTH_SUCCESS', token, user)
          resolve(response)
        }
      }).catch((err) => {
        commit('AUTH_ERROR')
        localStorage.removeItem('token')
        reject(err)
      })
    })
  },
  register ({ commit }, user) {
    return new Promise((resolve, reject) => {
      commit('AUTH_REQUEST')
      axios.post('/api/auth/register', user).then((response) => {
        if (response.status === 200) {
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
      commit('UPDATE_ACCESS_TOKEN', localStorage.getItem('token'))
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
  },
  AUTH_LOGOUT (state) {
    state.status = ''
    state.token = null
    state.user = {}
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
    state.token = token
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
