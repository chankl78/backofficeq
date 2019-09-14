<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-splitter v-model="splitterModel">
                <template v-slot:before>
                    <q-tabs
                        v-model="tab"
                        vertical
                        class="text-teal"
                    >
                        <q-tab name="info" icon="mdi-view-dashboard-outline" label="Info" />
                        <q-tab name="card" icon="mdi-card-text-outline" label="Card" />
                        <q-tab name="attendance" icon="mdi-bullhorn-outline" label="Attendance" />
                        <q-tab name="statistic" icon="mdi-chart-bar-stacked" label="Statistic" />
                        <q-tab name="eventitem" icon="mdi-calendar-check-outline" label="Event Item" />
                        <q-tab name="eventgroup" icon="mdi-account-group-outline" label="Groups" />
                        <q-tab name="eventshow" icon="mdi-calendar-clock" label="Show Dates" />
                        <!-- if REEV05R -->
                        <q-tab name="reports" icon="mdi-clipboard-text-outline" label="Reports" />
                        <!-- if REEV01R -->
                        <q-tab name="logs" icon="mdi-alert-box-outline" label="Logs" />
                        <q-tab name="access" icon="mdi-key-outline" label="Access" />
                    </q-tabs>
                </template>
                <template v-slot:after>
                    <q-tab-panels
                        v-model="tab"
                        animated
                        transition-prev="jump-up"
                        transition-next="jump-up"
                        @before-transition="loadPanel"
                    >
                        <q-tab-panel name="info">
                            <div class="text-h4 q-mb-md">{{ event.name }}</div>
                            <div class="text-h5 q-mb-md">Participants</div>
                            <q-table
                                title="Participants"
                                :filter="filter"
                                :data="event.participants"
                                :columns="participantsTable"
                                row-key="name"
                                :visible-columns="participantsTableVisibleColumns"
                            >
                                <template v-slot:top="props">
                                    <q-btn flat dense color="primary" :disable="loading" label="Add Participant" @click="addParticipant" />
                                    <q-space />
                                    <q-select
                                        v-model="participantsTableVisibleColumns"
                                        multiple
                                        dense
                                        options-dense
                                        :display-value="$q.lang.table.columns"
                                        emit-value
                                        map-options
                                        :options="participantsTable"
                                        option-value="name"
                                        style="min-width: 150px"
                                        class="q-mr-md"
                                    />
                                    <q-input dense debounce="300" color="primary" v-model="filter">
                                        <template v-slot:append>
                                            <q-icon name="search" />
                                        </template>
                                    </q-input>
                                </template>
                            </q-table>
                        </q-tab-panel>
                        <q-tab-panel name="card">
                            <div class="text-h4 q-mb-md">Card</div>
                            <p>Card</p>
                        </q-tab-panel>
                        <q-tab-panel name="attendance">
                            <div class="text-h4 q-mb-md">Attendance</div>
                            <p>Attendance</p>
                        </q-tab-panel>
                        <q-tab-panel name="statistic">
                            <div class="text-h4 q-mb-md">Statistic</div>
                            <p>Statistic</p>
                        </q-tab-panel>
                        <q-tab-panel name="eventitem">
                            <div class="text-h4 q-mb-md">Event Item</div>
                            <p>Event Item</p>
                        </q-tab-panel>
                        <q-tab-panel name="eventgroup">
                            <div class="text-h4 q-mb-md">Groups</div>
                            <p>Groups</p>
                        </q-tab-panel>
                        <q-tab-panel name="eventshow">
                            <div class="text-h4 q-mb-md">Show Dates</div>
                            <p>Show Dates</p>
                        </q-tab-panel>
                        <!-- if REEV05R -->
                        <q-tab-panel name="reports">
                            <div class="text-h4 q-mb-md">Reports</div>
                            <p>Reports</p>
                        </q-tab-panel>
                        <!-- if REEV01R -->
                        <q-tab-panel name="logs">
                            <div class="text-h4 q-mb-md">Logs</div>
                            <p>Logs</p>
                        </q-tab-panel>
                        <q-tab-panel name="access">
                            <div class="text-h4 q-mb-md">Access</div>
                            <p>Access</p>
                        </q-tab-panel>
                    </q-tab-panels>
                </template>
            </q-splitter>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'EventEdit',
  data () {
    return {
      loading: false,
      tab: 'info',
      splitterModel: 20,
      filter: '',
      participants: [],
      participantsTable: [
        { name: 'created_at', align: 'left', label: 'Created At', field: 'created_at', sortable: true },
        { name: 'name', align: 'left', label: 'Name', field: 'name', sortable: true },
        { name: 'rhq', align: 'center', label: 'RHQ', field: 'rhq', sortable: true },
        { name: 'division', align: 'center', label: 'Div', field: 'division', sortable: true },
        { name: 'gender', align: 'center', label: 'Gender', field: 'gender', sortable: true },
        { name: 'district', align: 'center', label: 'District', field: 'district', sortable: true },
        { name: 'age', align: 'center', label: 'Age', field: 'age', sortable: true },
        { name: 'nric', align: 'center', label: 'Nric', field: 'nric', sortable: true },
        { name: 'role', align: 'center', label: 'Role', field: 'role', sortable: true },
        { name: 'position', align: 'center', label: 'Position', field: 'position', sortable: true },
        { name: 'chapter', align: 'center', label: 'Chapter', field: 'chapter', sortable: true }
      ],
      participantsTableVisibleColumns: ['created_at', 'name', 'rhq', 'division', 'age']
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadEvent(to.params).then((response) => {
        vm.loading = false
        vm.event = response.data.event
        vm.participants = response.data.event.participants
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    },
    event: {
      get () {
        return this.currentEvent()
      },
      set (value) {
        // this.value = value
      }
    }
  },
  methods: {
    ...mapActions(['loadEvent', 'deleteEvent']),
    ...mapGetters(['currentEvent', 'userCan']),
    loadPanel (next, prev) {
      // tmp
    },
    addParticipant () {
      // tmp
    }
  }
}
</script>
