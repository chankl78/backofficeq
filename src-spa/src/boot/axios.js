import axios from 'axios'
import store from '../store'

export default async ({ Vue }) => {
  Vue.prototype.$axios = axios
  const token = localStorage.getItem('token')
  if (token) {
    Vue.prototype.$axios.defaults.headers.common['X-CSRF-TOKEN'] = token
  }
  const baseURL = 'http://localhost'
  if (typeof baseURL !== 'undefined') {
    Vue.prototype.$axios.defaults.baseURL = baseURL
  }
  Vue.prototype.$axios.interceptors.response.use(undefined, function (err) {
    return new Promise(function (resolve, reject) {
      if (err.status === 401/* && err.config && !err.config.__isRetryRequest */) {
        store.dispatch('logout')
      }
      throw err
    })
  })
}
