<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-banner dense inline-actions class="shadow-1">
                <template v-slot:avatar>
                    <q-icon name="mdi-checkbox-marked-circle-outline" class="q-ma-lg-md" color="teal-8" />
                </template>
                <div class="text-h4 q-mt-md-lg q-mb-md-lg">{{ event.description }}</div>
            </q-banner>
            <q-splitter v-model="splitterModel">
                <template v-slot:before>
                    <q-tabs
                        v-model="tab"
                        vertical
                        class="text-teal"
                    >
                        <q-tab name="info" :class="tab === 'info' ? 'bg-teal-1' : ''" icon="mdi-view-dashboard-outline" label="Info" />
                        <q-tab name="participants" :class="tab === 'participants' ? 'bg-teal-1' : ''" icon="mdi-account-group-outline" label="Participants" />
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
                        @before-transition="loadPanel"
                    >
                        <q-tab-panel name="info">
                            <q-card class="relative-position card-example">
                                <q-card-section>
                                    <div class="text-h4 q-mb-md">Event details</div>
                                </q-card-section>
                                <q-card-section class="col-sm-12">
                                    <form name="info" ref="info">
                                        <q-list>
                                            <q-item>
                                                <q-item-section>
                                                    <q-item-label caption>Name</q-item-label>
                                                    <q-item-label v-if="!isEditMode" lines="2">{{ event.description }}</q-item-label>
                                                    <q-input v-if="isEditMode" name="description" type="textarea" v-model="tempData.description"/>
                                                </q-item-section>
                                            </q-item>
                                            <q-item>
                                                <q-item-section>
                                                    <q-item-label caption>Location</q-item-label>
                                                    <q-item-label v-if="!isEditMode" lines="2">{{ event.location || '--' }}</q-item-label>
                                                    <q-input v-if="isEditMode" name="location" v-model="tempData.location"/>
                                                </q-item-section>
                                            </q-item>
                                            <q-item>
                                                <q-item-section>
                                                    <q-item-label caption>Type</q-item-label>
                                                    <q-item-label v-if="!isEditMode" lines="2">{{ event.eventtype }}</q-item-label>
                                                    <q-select
                                                      name="eventtype"
                                                      v-if="isEditMode"
                                                      v-model="tempData.eventtype"
                                                      :options="eventTypes"
                                                      option-value="label"
                                                      emit-value
                                                    />
                                                </q-item-section>
                                            </q-item>
                                            <q-item>
                                                <q-item-section>
                                                    <q-item-label caption>Date</q-item-label>
                                                    <q-item-label v-if="!isEditMode" lines="2">{{ event.eventdate }}</q-item-label>
                                                    <q-input v-if="isEditMode" name="eventdate" v-model="tempData.eventdate">
                                                        <template v-slot:append>
                                                            <q-icon name="event" class="cursor-pointer">
                                                                <q-popup-proxy ref="qDateProxy" transition-show="scale" transition-hide="scale">
                                                                    <q-date mask="YYYY-MM-DD" @input="() => $refs.qDateProxy.hide()" />
                                                                </q-popup-proxy>
                                                            </q-icon>
                                                        </template>
                                                    </q-input>
                                                </q-item-section>
                                            </q-item>
                                            <q-item>
                                                <q-item-section>
                                                    <q-item-label caption>Status</q-item-label>
                                                    <q-item-label v-if="!isEditMode" lines="2">{{ event.status }}</q-item-label>
                                                    <q-input v-if="isEditMode" name="status" v-model="tempData.status"/>
                                                </q-item-section>
                                            </q-item>
                                        </q-list>
                                    </form>
                                </q-card-section>
                            </q-card>
                        </q-tab-panel>
                        <q-tab-panel name="participants">
                            <q-card class="relative-position card-example">
                                <q-card-section>
                                    <div class="text-h4 q-mb-md">Participants</div>
                                </q-card-section>
                                <q-table
                                    :loading="loading"
                                    :filter="filter"
                                    :data="participants"
                                    :columns="participantsTable"
                                    row-key="name"
                                    :visible-columns="participantsTableVisibleColumns"
                                >
                                    <template v-if="loading === false" v-slot:top="props">
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
                        <q-tab-panel name="attendance">
                            <q-card class="relative-position card-example">
                                <q-card-section>
                                    <div class="text-h4 q-mb-md">Attendance</div>
                                </q-card-section>
                            </q-card>
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
        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn v-if="allowed('create') && isEditMode === false" fab color="primary" :disable="loading" icon="mdi-pencil" @click="editEvent" class="q-mr-sm"/>
            <q-btn v-if="allowed('create') && isEditMode === true" fab color="red" :disable="loading" icon="mdi-check" @click="saveEvent" class="q-mr-sm"/>
            <q-btn v-if="allowed('create') && isEditMode === true" fab color="grey" :disable="loading" icon="mdi-cancel" @click="cancelEdit" class="q-mr-sm"/>
        </q-page-sticky>
    </q-page>
</template>

<script>
import { mapActions, mapGetters, mapState } from 'vuex'

export default {
  name: 'EventEdit',
  data () {
    return {
      loading: false,
      tab: 'info',
      tempData: {},
      eventTypes: [],
      splitterModel: 20,
      filter: '',
      isEditMode: false,
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
    computedColumns () {
      return this.participantsTable.filter((c) => this.participantsTableVisibleColumns.includes(c.name))
    }
  },
  methods: {
    ...mapActions(['loadEvent', 'loadParticipants', 'updateEvent', 'deleteEvent']),
    ...mapGetters(['currentEvent', 'userCan']),
    ...mapState(['event']),
    loadPanel (next, prev) {
      switch (next) {
        case 'participants':
          this.loadParticipants(this.$route.params).then((response) => {
            this.loading = false
            this.participants = response.participants
          }).catch((err) => console.log(err))
          break
        case 'info':
        default:
          this.loadEvent(this.$route.params).then((response) => {
            this.loading = false
            this.event = this.tempData = JSON.parse(JSON.stringify(response.event))
            this.eventTypes = JSON.parse(JSON.stringify(response.eventTypes))
          }).catch((err) => console.log(err))
      }
    },
    editEvent () {
      this.isEditMode = true
    },
    saveEvent () {
      let params = {
        id: this.$route.params.id,
        section: this.tab,
        data: JSON.parse(JSON.stringify(this.event))
      }
      this.updateEvent(params).then((resp) => {
        this.isEditMode = false
      }).catch((err) => console.log(err))
    },
    cancelEdit () {
      this.isEditMode = false
    },
    selectChanged (input) {
      this.tempData.eventtype = this.event.eventtype
      this.event.eventtype = input
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
