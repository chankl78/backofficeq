<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="rolesList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
                :selected.sync="selected"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Roles List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                        </template>
                    </q-input>
                </template>
                <template v-slot:body="props">
                    <q-tr :props="props" @click.native="editRole(props.row)" class="cursor-pointer">
                        <q-td key="name" :props="props">{{ props.row.name }}</q-td>
                        <q-td key="description" :props="props">{{ props.row.description }}</q-td>
                    </q-tr>
                </template>
            </q-table>
            <q-page-sticky position="bottom-right" :offset="[18, 18]">
                <q-btn v-if="allowed('create')" fab color="primary" :disable="loading" icon="mdi-plus" @click="addRole"/>
            </q-page-sticky>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'RoleAccess',
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
        { name: 'description', field: 'description', label: 'Name', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: []
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadRolesList().then(() => {
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
    ...mapActions(['loadRolesList', 'deleteRole']),
    ...mapGetters(['rolesList', 'userCan']),
    addRole () {
      if (this.allowed('create')) {
        this.$router.push({
          name: 'role-access-new'
        })
      }
    },
    editRole (role) {
      if (this.allowed('update')) {
        this.$router.push({
          name: 'role-access-edit',
          params: { id: role.id }
        })
      }
    }
  }
}
</script>
