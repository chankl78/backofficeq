import axios from 'axios'
import { Cookies } from 'quasar'
import store from '../store'

export default async ({ Vue }) => {
  Vue.prototype.$axios = axios

  if (Cookies.has('token')) {
    Vue.prototype.$axios.defaults.headers.common['Authorization'] = 'Bearer ' + Cookies.get('token')
  }

  const baseURL = process.env.api
  console.log('BASE URL:' + baseURL)
  if (typeof baseURL !== 'undefined') {
    Vue.prototype.$axios.defaults.baseURL = baseURL
  }
  Vue.prototype.$axios.interceptors.request.use(config => {
    if (Cookies.has('token')) {
      config.headers['Authorization'] = 'Bearer ' + Cookies.get('token')
    }
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
