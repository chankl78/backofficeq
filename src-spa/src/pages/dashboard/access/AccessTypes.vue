<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-table
                :data="typesList()"
                :columns="columns"
                row-key="id"
                :loading="loading"
                :filter="filter"
                selection="single"
                :selected.sync="selected"
            >
                <template v-slot:top>
                    <div class="col-2 q-table__title">Types List</div>
                    <q-space />
                    <q-input debounce="300" color="primary" v-model="filter">
                        <template v-slot:append>
                            <q-icon name="mdi-magnify" class="q-mr-md" />
                        </template>
                    </q-input>
                </template>
            </q-table>
            <q-btn-group>
                <q-btn dense color="primary" :disable="loading" label="Add Type" @click="addType" class="q-px-md"/>
                <q-btn dense color="primary" :disable="loading || selected.length == 0" label="Update Type" @click="editType" class="q-px-md"/>
                <q-btn dense color="red" :disable="loading || selected.length == 0" label="Delete Type" @click="removeType" class="q-px-md"/>
            </q-btn-group>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'AccessTypes',
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
        { name: 'value', field: 'value', label: 'Type Name', align: 'left', required: true, sortable: true }
      ],
      filter: '',
      selected: []
    }
  },
  created () {
    this.loadTypesList().then(() => {
      this.loading = false
    })
  },
  methods: {
    ...mapActions(['loadTypesList', 'deleteType']),
    ...mapGetters(['typesList']),
    addType () {
      this.$router.push({
        name: 'default-table-access-types-new'
      })
    },
    editType () {
      this.$router.push({
        name: 'default-table-access-types-edit',
        params: { id: this.selected[0].id }
      })
      console.log(this.selected[0].id)
    },
    removeType () {
      this.$q.dialog({
        title: 'Delete Type',
        message: 'Are you sure?',
        cancel: true,
        persistent: true
      }).onOk(data => {
        this.deleteType(this.selected[0].id).then((response) => {
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
