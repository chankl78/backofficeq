<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="eventsList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
                :selected.sync="selected"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Events List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                        </template>
                    </q-input>
                </template>
                <template v-slot:body="props">
                    <q-tr :props="props" @click.native="editEvent(props.row)" class="cursor-pointer">
                        <q-td key="eventdate" :props="props">{{ props.row.eventdate }}</q-td>
                        <q-td key="eventtype" :props="props">{{ props.row.eventtype }}</q-td>
                        <q-td key="description" :props="props">{{ props.row.description }}</q-td>
                        <q-td key="location" :props="props">{{ props.row.location }}</q-td>
                        <q-td key="status" :props="props">
                            <q-chip v-if="props.row.status === 'Active'" dense color="green" text-color="white">
                                <q-avatar icon="mdi-check-circle-outline" color="green" text-color="white" />
                                {{ props.row.status }}
                            </q-chip>
                            <q-chip v-if="props.row.status === 'Closed'" dense color="primary" text-color="white">
                                <q-avatar icon="mdi-close-circle-outline" color="primary" text-color="white" />
                                {{ props.row.status }}
                            </q-chip>
                            <q-chip v-if="props.row.status === 'Void'" dense color="red" text-color="white">
                                <q-avatar icon="mdi-cancel" color="red" text-color="white" />
                                {{ props.row.status }}
                            </q-chip>
                        </q-td>
                    </q-tr>
                </template>
            </q-table>
            <q-page-sticky position="bottom-right" :offset="[18, 18]">
                <q-btn v-if="allowed('create')" fab color="primary" :disable="loading" icon="mdi-plus" @click="addEvent" class="q-mr-sm"/>
            </q-page-sticky>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'Event',
  data () {
    return {
      loading: true,
      pagination: {
        sortBy: 'id',
        descending: false,
        page: 1,
        rowsPerPage: 10,
        rowsNumber: 10
      },
      columns: [
        { name: 'eventdate', field: 'eventdate', label: 'Date', align: 'left', required: true, sortable: true },
        { name: 'eventtype', field: 'eventtype', label: 'Event Type', align: 'left', required: true, sortable: true },
        { name: 'description', field: 'description', label: 'Description', align: 'left', required: true, sortable: true },
        { name: 'location', field: 'location', label: 'Location', align: 'left', required: true, sortable: true },
        { name: 'status', field: 'status', label: 'Status', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: []
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadEventsList().then(() => {
        vm.loading = false
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    }
  },
  methods: {
    ...mapActions(['loadEventsList', 'deleteEvent']),
    ...mapGetters(['eventsList', 'userCan']),
    addEvent () {
      // tmp
    },
    editEvent (row) {
      this.$router.push({
        name: 'event-details',
        params: { id: row.uniquecode }
      })
    }
  }
}
</script>
