import { makeMutations } from '../../helpers'
import axios from 'axios'

const state = {
  loading: false,
  event: {}
}

const getters = {
  currentEvent: state => state.event
}

const actions = {
  loadEvent ({ commit }, params = {}) {
    commit('LOAD_EVENT')
    return new Promise((resolve, reject) => {
      console.log(params)
      axios.get('/api/data/event/' + params.id).then((response) => {
        commit('LOAD_EVENT_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_EVENT_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_EVENT',
    'CREATE_EVENT',
    'UPDATE_EVENT',
    'DELETE_EVENT'
  ], (state) => {
    state.status = 'loading'
  }),
  LOAD_EVENT_OK (state, data) {
    state.status = 'success'
    state.event = data.event
  },
  ...makeMutations([
    'LOAD_EVENT_FAIL',
    'CREATE_EVENT_FAIL',
    'UPDATE_EVENT_FAIL',
    'DELETE_EVENT_FAIL'
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
