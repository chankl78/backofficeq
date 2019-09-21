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
      console.log(params)
      axios.get('/api/data/event/' + params.id).then((response) => {
        commit('LOAD_EVENT_OK', response.data)
        resolve({
          event: state.event,
          participants: state.participants
        })
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
    state.participants = data.event.registrations.map((p) => {
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
