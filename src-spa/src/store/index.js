/* eslint-disable */
import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

// import example from './module-example'

Vue.use(Vuex)

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation
 */

//export default function (/* { ssrContext } */) {
  const Store = new Vuex.Store({
    state: {
      status: '',
      token: localStorage.getItem('token'),
      user: {}
    },
    mutations: {
      auth_request (state) {
        state.status = 'loading'
      },
      auth_success (state, token, user) {
        state.status = 'success'
        state.token = token
        state.user = user
      },
      auth_error (state) {
        state.status = 'error'
      },
      auth_reset_pass_request (state) {
        state.status = 'loading'
        state.token = ''
        state.user = ''
      },
      logout (state) {
        state.status = ''
        state.token = ''
      }
    },
    actions: {
      login ({ commit }, user) {
        return new Promise((resolve, reject) => {
          commit('auth_request')
          axios.post('/postlogin', user).then((response) => {
            if (response.status === 200) {
              const token = response.data.token
              const user = response.data.user
              localStorage.setItem('token', token)
              axios.defaults.headers.common['X-CSRF-TOKEN'] = token
              commit('auth_success', token, user)
              resolve(response)
            }
          }).catch((err) => {
            commit('auth_error')
            localStorage.removeItem('token')
            reject(err)
          })
        })
      },
      logout ({ commit }) {
        return new Promise((resolve, reject) => {
          commit('logout')
          localStorage.removeItem('token')
          delete axios.defaults.headers.common['X-CSRF-TOKEN']
          resolve()
        })
      },
      resetPassword ({commit}, email) {
        return new Promise((resolve, reject) => {
          commit('auth_reset_pass_request')
          axios.post('/reset-pass', { 'email': email }).then((response) => {
            if (response.status === 200) {
              resolve(response)
            }
          }).catch((err) => {
            commit('auth_error')
            reject(err)
          })
        })
      }
    },
    getters: {
      isLoggedIn: state => !!state.token,
      authStatus: state => state.status
    },
    modules: {
      // example
    },

    // enable strict mode (adds overhead!)
    // for dev mode only
    strict: process.env.DEV
  })

  export default Store
//}
