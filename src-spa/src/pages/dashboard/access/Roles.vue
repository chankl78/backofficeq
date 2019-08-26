<template>
    <q-page padding>
        <div class="q-pa-md">
            <q-table
                title="Roles List"
                :data="data.roles"
                :columns="columns"
                row-key="name"
                :loading="loading"
            />
        </div>
    </q-page>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  name: 'Roles',
  data () {
    return {
      loading: false,
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
      rolesList: []
    }
  },
  computed: {
    ...mapState({
      data: state => state.roles
    })
  },
  mounted () {
    this.loadRolesList().then((res) => {
      this.rolesList = this.roles
      this.loading = false
    })
  },
  methods: {
    ...mapActions(['loadRolesList'])
  }
}
</script>
