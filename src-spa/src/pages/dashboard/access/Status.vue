<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="statusesList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
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
                <template v-slot:body="props">
                    <q-tr :props="props" @click.native="editStatus(props.row)" class="cursor-pointer">
                        <q-td key="name" :props="props">{{ props.row.name }}</q-td>
                        <q-td key="description" :props="props">{{ props.row.description }}</q-td>
                    </q-tr>
                </template>
            </q-table>
            <q-page-sticky position="bottom-right" :offset="[18, 18]">
                <q-btn v-if="allowed('create')" fab color="primary" :disable="loading" icon="mdi-plus" @click="addStatus"/>
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
    ...mapActions(['loadStatusesList']),
    ...mapGetters(['statusesList', 'userCan']),
    addStatus () {
      if (this.allowed('create')) {
        this.$router.push({
          name: 'default-table-statuses-new'
        })
      }
    },
    editStatus (status) {
      if (this.allowed('update')) {
        this.$router.push({
          name: 'default-table-statuses-edit',
          params: { id: status.id }
        })
      }
    }
  }
}
</script>
