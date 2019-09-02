<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="usersList()"
                :columns="columns"
                row-key="uniquecode"
                :loading="loading"
                :filter="filter"
                selected.sync="selected"
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
                <template v-slot:body="props">
                    <q-tr :props="props" @click.native="editUser(props.row)" class="cursor-pointer">
                        <q-td key="name" :props="props">{{ props.row.name }}</q-td>
                        <q-td key="username" :props="props">{{ props.row.username }}</q-td>
                        <q-td key="email" :props="props">{{ props.row.email }}</q-td>
                        <q-td key="email_verified_at" :props="props">{{ props.row.email_verified_at }}</q-td>
                        <q-td key="role" :props="props">{{ props.row.role.join(', ') }}</q-td>
                        <q-td key="accessType" :props="props">{{ props.row.accessType }}</q-td>
                        <q-td key="_status" :props="props">{{ props.row._status }}</q-td>
                        <q-td key="created_at" :props="props">{{ props.row.created_at }}</q-td>
                        <q-td key="updated_at" :props="props">{{ props.row.updated_at }}</q-td>
                    </q-tr>
                </template>
            </q-table>
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
        { name: 'name', field: 'name', label: 'Name', align: 'left', required: true, sortable: true },
        { name: 'username', field: 'username', label: 'Username', align: 'left', required: true, sortable: true },
        { name: 'email', field: 'email', label: 'Email', align: 'left', required: true, sortable: true },
        { name: 'email_verified_at', field: 'email_verified_at', label: 'Email Verified At', align: 'left', required: true, sortable: true },
        { name: 'role', field: 'role', label: 'Roles', align: 'left', required: true, sortable: true },
        { name: 'accessType', field: 'accessType', label: 'Access type', align: 'left', required: true, sortable: true },
        { name: '_status', field: '_status', label: 'Status', align: 'left', required: true, sortable: true },
        { name: 'created_at', field: 'created_at', label: 'Created At', align: 'left', required: true, sortable: true },
        { name: 'updated_at', field: 'updated_at', label: 'Updated At', align: 'left', required: true, sortable: true }
      ],
      visibleColumns: ['name', 'username', 'email', 'email_verified_at', 'role', 'accessType', '_status', 'created_at', 'updated_at'],
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
    ...mapActions(['loadUsersList']),
    ...mapGetters(['usersList', 'userCan']),
    editUser (user) {
      if (this.allowed('update')) {
        this.$router.push({
          name: 'user-access-edit',
          params: { id: user.uniquecode }
        })
      }
    }
  }
}
</script>
