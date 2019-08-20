import axios from 'axios'

export default async ({ Vue }) => {
  Vue.prototype.$axios = axios
  const baseURL = 'http://localhost'
  if (typeof baseURL !== 'undefined') {
    Vue.prototype.$axios.defaults.baseURL = baseURL
  }
}
