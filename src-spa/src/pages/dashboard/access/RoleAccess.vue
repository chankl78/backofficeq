<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="rolesList()"
                :columns="columns"
                row-key="name"
                :loading="loading"
                :filter="filter"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Roles List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                            <q-btn dense color="primary" :disable="loading" label="Add New Role" @click="addRole" class="q-px-md"/>
                        </template>
                    </q-input>
                </template>
                <template v-slot:body="props">
                    <q-tr :props="props">
                        <q-td key="id" :props="props">{{ props.row.id }}</q-td>
                        <q-td key="value" :props="props">
                            {{ props.row.value }}
                        </q-td>
                        <q-td class="text-center">
                            <q-btn
                                dense
                                round
                                icon="mdi-pencil"
                                size="sm"
                                @click="editRole(props.row.id)"
                                color="primary"
                                class="q-mr-sm"
                            />
                            <q-btn dense round icon="mdi-close" size="sm" @click="removeRole(props.row.id)" color="red"/>
                        </q-td>
                    </q-tr>
                </template>
            </q-table>
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
        { name: 'id', field: 'id', label: 'ID', align: 'left', required: true, sortable: true },
        { name: 'value', field: 'value', label: 'Role Name', align: 'left', required: true, sortable: true }
      ],
      filter: ''
    }
  },
  created () {
    this.loadRolesList().then(() => {
      this.loading = false
    })
  },
  methods: {
    ...mapActions(['loadRolesList', 'deleteRole']),
    ...mapGetters(['rolesList']),
    addRole () {
      this.$router.push({
        name: 'role-access-new'
      })
    },
    editRole (id) {
      this.$router.push({
        name: 'role-access-edit',
        params: { id: id }
      })
      console.log(id)
    },
    removeRole (id) {
      this.deleteRole(id).then((response) => {
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
    }
  }
}
</script>
