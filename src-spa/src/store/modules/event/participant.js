import axios from 'axios'

const state = {
  loading: false,
  participant: {},
  member: {}
}

const getters = {
  currentParticipant: state => state.participant
}

const actions = {
  loadParticipant ({ commit }, params = {}) {
    commit('LOAD_PARTICIPANT')
    console.log(params)
    return new Promise((resolve, reject) => {
      axios.get('/api/data/participants/' + params.id).then((response) => {
        commit('LOAD_PARTICIPANT_OK', response.data)
        resolve(state.participant)
      }).catch((err) => {
        commit('LOAD_PARTICIPANT_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  LOAD_PARTICIPANT (state) {
    state.status = 'loading'
  },
  LOAD_PARTICIPANT_OK (state, data) {
    state.status = 'success'
    state.participant = data.participant
    state.member = data.participant.member
  },
  LOAD_PARTICIPANT_FAIL (state) {
    state.status = 'fail'
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
