import axios from 'axios'
import store from '../store'

export default async ({ Vue }) => {
  Vue.prototype.$axios = axios

  const token = localStorage.getItem('token')
  if (token) {
    Vue.prototype.$axios.defaults.headers.common['Authorization'] = 'Bearer ' + token
  }

  const baseURL = process.env.api
  console.log('BASE URL:' + baseURL)
  if (typeof baseURL !== 'undefined') {
    Vue.prototype.$axios.defaults.baseURL = baseURL
  }
  Vue.prototype.$axios.interceptors.request.use(config => {
    config.headers['Authorization'] = 'Bearer ' + localStorage.getItem('token')
    return config
  })
  Vue.prototype.$axios.interceptors.response.use(undefined, function (err) {
    return new Promise(function (resolve, reject) {
      if (err.status === 401/* && err.config && !err.config.__isRetryRequest */) {
        store.dispatch('logout')
      }
      throw err
    })
  })
}
