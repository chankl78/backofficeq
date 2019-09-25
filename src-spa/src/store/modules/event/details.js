import { makeMutations } from '../../helpers'
import axios from 'axios'
import moment from 'moment'

const state = {
  loading: false,
  event: {},
  participants: []
}

const getters = {
  currentEvent: state => state.event
}

const actions = {
  loadEvent ({ commit }, params = {}) {
    commit('LOAD_EVENT')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/event/' + params.id).then((response) => {
        commit('LOAD_EVENT_OK', response.data)
        resolve({
          event: state.event,
          eventTypes: state.eventTypes,
          participants: state.participants
        })
      }).catch((err) => {
        commit('LOAD_EVENT_FAIL')
        reject(err)
      })
    })
  },
  loadParticipants ({ commit }, params = {}) {
    commit('LOAD_PARTICIPANTS_LIST')
    return new Promise((resolve, reject) => {
      axios.get('/api/data/event/' + params.id + '/participants').then((response) => {
        commit('LOAD_PARTICIPANTS_LIST_OK', response.data)
        resolve({
          participants: state.participants
        })
      }).catch((err) => {
        commit('LOAD_PARTICIPANTS_LIST_FAIL')
        reject(err)
      })
    })
  },
  updateEvent ({ commit }, params) {
    commit('UPDATE_EVENT')
    return new Promise((resolve, reject) => {
      axios.put('/api/data/event/' + params.id + '/' + params.section, params.data).then((response) => {
        commit('UPDATE_EVENT_OK', response.data)
        resolve(response)
      }).catch((err) => {
        commit('UPDATE_EVENT_FAIL')
        reject(err)
      })
    })
  }
}

const mutations = {
  ...makeMutations([
    'LOAD_EVENT',
    'LOAD_PARTICIPANTS_LIST',
    'CREATE_EVENT',
    'UPDATE_EVENT',
    'DELETE_EVENT'
  ], (state) => {
    state.status = 'loading'
  }),
  LOAD_EVENT_OK (state, data) {
    state.status = 'success'
    state.event = data.event
    state.eventTypes = data.event_types.map((el) => ({ label: el.value, value: el.value }))
  },
  UPDATE_EVENT_OK (state, data) {
    console.log(data)
  },
  LOAD_PARTICIPANTS_LIST_OK (state, data) {
    state.participants = data.participants.map((p) => {
      let member = p.member
      return {
        uniquecode: member.uniquecode,
        created_at: p.created_at,
        name: member.name || '-',
        chinese_name: member.chinesename || '-',
        age: moment(Date.now()).diff(member.dateofbirth, 'year'),
        event_item: '-',
        audition_code: '-',
        group_code: '-',
        rhq: member.rhq || '-',
        zone: member.zone || '-',
        chapter: member.chapter || '-',
        district: member.district || '-',
        division: member.division || '-',
        position: member.position || '-',
        gender: member.gender || '-',
        nric: member.nric || '-'
      }
    })
  },
  ...makeMutations([
    'LOAD_EVENT_FAIL',
    'LOAD_PARTICIPANTS_LIST_FAIL',
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
