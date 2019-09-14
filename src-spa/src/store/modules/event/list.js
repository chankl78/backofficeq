import axios from 'axios'

const state = {
  loading: false,
  events: []
}

const getters = {
  eventsList: state => state.events
}

const actions = {
  loadEventsList ({ commit }, params = {}) {
    commit('LOAD_EVENTS')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/events', { params: params }).then((response) => {
        commit('LOAD_EVENTS_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('LOAD_EVENTS_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  LOAD_EVENTS (state) {
    state.status = 'loading'
  },
  LOAD_EVENTS_OK (state, data) {
    state.status = 'success'
    state.events = data.map((item) => ({
      ...item,
      event_type: item.event_type[0].value || 'not set',
      rowSelected: 'false'
    }))
  },
  LOAD_EVENT_OK (state, data) {
    state.status = 'success'
    state.event = data.event
  },
  LOAD_EVENTS_FAIL (state) {
    state.status = 'fail'
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
