<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-banner dense inline-actions class="shadow-1">
                <template v-slot:avatar>
                    <q-icon name="mdi-checkbox-marked-circle-outline" class="q-ma-lg-md" color="teal-8" />
                </template>
                <div class="text-h4 q-mt-md-lg q-mb-md-lg">{{ event.description }}</div>
                <template v-slot:action>
                    <q-btn flat color="negative" label="Delete event" />
                </template>
            </q-banner>
            <q-splitter v-model="splitterModel">
                <template v-slot:before>
                    <q-tabs
                        v-model="tab"
                        vertical
                        class="text-teal"
                    >
                        <q-tab name="info" :class="tab === 'info' ? 'bg-teal-1' : ''" icon="mdi-view-dashboard-outline" label="Info" />
                        <q-tab name="card" :class="tab === 'card' ? 'bg-teal-1' : ''" icon="mdi-card-text-outline" label="Card" />
                        <q-tab name="attendance" :class="tab === 'attendance' ? 'bg-teal-1' : ''" icon="mdi-bullhorn-outline" label="Attendance" />
                        <q-tab name="statistic" :class="tab === 'statistic' ? 'bg-teal-1' : ''" icon="mdi-chart-bar-stacked" label="Statistic" />
                        <q-tab name="eventitem" :class="tab === 'eventitem' ? 'bg-teal-1' : ''" icon="mdi-calendar-check-outline" label="Event Item" />
                        <q-tab name="eventgroup" :class="tab === 'eventgroup' ? 'bg-teal-1' : ''" icon="mdi-account-group-outline" label="Groups" />
                        <q-tab name="eventshow" :class="tab === 'eventshow' ? 'bg-teal-1' : ''" icon="mdi-calendar-clock" label="Show Dates" />
                        <!-- if REEV05R -->
                        <q-tab name="reports" :class="tab === 'reports' ? 'bg-teal-1' : ''" icon="mdi-clipboard-text-outline" label="Reports" />
                        <!-- if REEV01R -->
                        <q-tab name="logs" :class="tab === 'logs' ? 'bg-teal-1' : ''" icon="mdi-alert-box-outline" label="Logs" />
                        <q-tab name="access" :class="tab === 'access' ? 'bg-teal-1' : ''" icon="mdi-key-outline" label="Access" />
                    </q-tabs>
                </template>
                <template v-slot:after>
                    <q-tab-panels
                        v-model="tab"
                        animated
                        transition-prev="jump-up"
                        transition-next="jump-up"
                        :before-transition="loadPanel"
                    >
                        <q-tab-panel name="info">
                            <q-card class="relative-position card-example">
                                <q-card-section>
                                    <div class="text-h4 q-mb-md">Participants</div>
                                </q-card-section>
                                <q-table
                                    title="Participants"
                                    :loading="loading"
                                    :filter="filter"
                                    :data="participants"
                                    :columns="participantsTable"
                                    row-key="name"
                                    :visible-columns="participantsTableVisibleColumns"
                                >
                                    <template v-if="loading === false" v-slot:top="props">
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
                                    <template v-if="loading === false" v-slot:body="props">
                                        <q-tr :props="props" class="cursor-pointer" @click.native="participantDetails(props.row)">
                                            <q-td :align="val.align" v-for="(val, key) in computedColumns" :key="key">{{ props.row[val.name] }}</q-td>
                                        </q-tr>
                                    </template>
                                </q-table>
                            </q-card>
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
        { name: 'chinese_name', align: 'center', label: 'Chinese Name', field: 'chinese_name', sortable: true },
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
      participantsTableVisibleColumns: ['created_at', 'name', 'rhq', 'zone', 'age']
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loading = true
      vm.loadPanel('info', '')
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
        this.value = value
      }
    },
    computedColumns () {
      return this.participantsTable.filter((c) => this.participantsTableVisibleColumns.includes(c.name))
    }
  },
  methods: {
    ...mapActions(['loadEvent', 'deleteEvent']),
    ...mapGetters(['currentEvent', 'userCan']),
    loadPanel (next, prev) {
      switch (next) {
        case 'info':
        default:
          this.loadEvent(this.$route.params).then((response) => {
            this.loading = false
            this.event = response.event
            this.participants = response.participants
            console.log(this.participants[0])
          })
      }
    },
    addParticipant () {
      // tmp
    },
    participantDetails (item) {
      this.$router.push({
        name: 'participant-details',
        params: {
          id: item.uniquecode
        }
      })
    }
  }
}
</script>
