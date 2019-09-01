<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="usersList()"
                :columns="columns"
                row-key="uniquecode"
                :loading="loading"
                :filter="filter"
                :selection="selectionType"
                :selected.sync="selected"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Users List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                        </template>
                    </q-input>
                </template>
            </q-table>
            <q-btn-group>
                <q-btn v-if="allowed('update')" dense color="primary" :disable="loading || selected.length == 0" label="Edit User" @click="editUser" class="q-px-md"/>
                <q-btn v-if="allowed('delete')" dense color="red" :disable="loading || selected.length == 0" label="Delete User" @click="removeUser" class="q-px-md"/>
            </q-btn-group>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'UserAccess',
  data () {
    return {
      loading: true,
      pagination: {
        sortBy: 'created_at',
        descending: false,
        page: 1,
        rowsPerPage: 10,
        rowsNumber: 10
      },
      columns: [
        /* { name: 'uniquecode', field: 'uniquecode', label: 'ID', align: 'left', required: true, sortable: true }, */
        { name: 'name', field: 'name', label: 'Name', align: 'left', required: true, sortable: true },
        { name: 'username', field: 'username', label: 'Username', align: 'left', required: true, sortable: true },
        { name: 'email', field: 'email', label: 'Email', align: 'left', required: true, sortable: true },
        { name: 'email_verified_at', field: 'email_verified_at', label: 'Email Verified At', align: 'left', required: true, sortable: true },
        { name: 'role', field: 'role', label: 'Role', align: 'left', required: true, sortable: true },
        { name: 'accessType', field: 'accessType', label: 'Access type', align: 'left', required: true, sortable: true },
        { name: '_status', field: '_status', label: 'Status', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: [],
      selectionType: 'none'
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadUsersList().then(() => {
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
    ...mapActions(['loadUsersList', 'deleteUser']),
    ...mapGetters(['usersList', 'userCan']),
    editUser () {
      if (this.allowed('update')) {
        this.$router.push({
          name: 'user-access-edit',
          params: { id: this.selected[0].uniquecode }
        })
      }
    },
    removeUser () {
      if (this.allowed('delete')) {
        this.$q.dialog({
          title: 'Delete User',
          message: 'Are you sure?',
          cancel: true,
          persistent: true
        }).onOk(data => {
          this.deleteUser(this.selected[0].uniquecode).then((response) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: response.data.message
            })
          }).catch((error) => {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.error || 'Loading failed',
              icon: 'report_problem'
            })
          })
        })
      }
    }
  }
}
</script>
