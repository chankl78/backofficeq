<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="statusesList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
                :selection="selectionType"
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
            <q-page-sticky position="bottom-right" :offset="[18, 18]">
                <q-btn v-if="allowed('create')" fab color="primary" :disable="loading" icon="mdi-plus" @click="addStatus" class="q-mr-sm"/>
                <q-btn v-if="allowed('update')" fab color="primary" :disable="loading || selected.length == 0" icon="mdi-pencil" @click="editStatus" class="q-mr-sm"/>
                <q-btn v-if="allowed('delete')" fab color="red" :disable="loading || selected.length == 0" icon="mdi-delete" @click="removeStatus"/>
            </q-page-sticky>
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
        { name: 'name', field: 'name', label: 'Code', align: 'left', required: true, sortable: true },
        { name: 'description', field: 'description', label: 'Status Name', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: [],
      selectionType: 'none'
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadStatusesList().then(() => {
        vm.loading = false
        vm.selectionType = vm.allowed(['update', 'delete'], false) ? 'single' : 'none'
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    }
  },
  methods: {
    ...mapActions(['loadStatusesList', 'deleteStatus']),
    ...mapGetters(['statusesList', 'userCan']),
    addStatus () {
      if (this.allowed('create')) {
        this.$router.push({
          name: 'default-table-statuses-new'
        })
      }
    },
    editStatus () {
      if (this.allowed('update')) {
        this.$router.push({
          name: 'default-table-statuses-edit',
          params: { id: this.selected[0].id }
        })
      }
    },
    removeStatus () {
      if (this.allowed('delete')) {
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
}
</script>
