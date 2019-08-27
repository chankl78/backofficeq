<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="statusesList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
                selection="single"
                :selected.sync="selected"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Statuses List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                        </template>
                    </q-input>
                </template>
            </q-table>
            <q-btn-group>
                <q-btn dense color="primary" :disable="loading" label="Add Status" @click="addStatus" class="q-px-md"/>
                <q-btn dense color="primary" :disable="loading || selected.length == 0" label="Update Status" @click="editStatus" class="q-px-md"/>
                <q-btn dense color="red" :disable="loading || selected.length == 0" label="Delete Status" @click="removeStatus" class="q-px-md"/>
            </q-btn-group>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'Status',
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
        { name: 'id', field: 'id', label: 'ID', align: 'left', required: true, sortable: true },
        { name: 'value', field: 'value', label: 'Status Name', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: []
    }
  },
  created () {
    this.loadStatusesList().then(() => {
      this.loading = false
    })
  },
  methods: {
    ...mapActions(['loadStatusesList', 'deleteStatus']),
    ...mapGetters(['statusesList']),
    addStatus () {
      this.$router.push({
        name: 'default-table-statuses-new'
      })
    },
    editStatus () {
      this.$router.push({
        name: 'default-table-statuses-edit',
        params: { id: this.selected[0].id }
      })
      console.log(this.selected[0].id)
    },
    removeStatus () {
      this.$q.dialog({
        title: 'Delete Status',
        message: 'Are you sure?',
        cancel: true,
        persistent: true
      }).onOk(data => {
        this.deleteStatus(this.selected[0].id).then((response) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: response.data.message
          })
          this.selected = []
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Loading failed',
            icon: 'report_problem'
          })
          this.selected = []
        })
      })
    }
  }
}
</script>
