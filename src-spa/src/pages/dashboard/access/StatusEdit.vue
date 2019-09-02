<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm" v-if="havePermissions">
            <h4>{{ this.editMode ? 'Edit status' : 'Create status'}}</h4>
            <q-form ref="statusForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="value"
                    v-model="status"
                    label="Status Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
            </q-form>
        </div>
        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn v-if="allowed('update')" fab color="primary" icon="mdi-check" @click="save" class="q-mr-sm"/>
            <q-btn v-if="allowed('delete') && editMode" fab color="red" icon="mdi-delete" @click="removeStatus" class="q-mr-sm"/>
            <q-btn fab to="/default-table/statuses" icon="mdi-cancel"/>
        </q-page-sticky>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'StatusEdit',
  data () {
    return {
      loading: false,
      status: '',
      editMode: false,
      havePermissions: false
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      let id = vm.$router.currentRoute.params.id || 'new'
      vm.loadStatus({ id: id }).then((resp) => {
        vm.havePermissions = true
        vm.status = vm.currentStatus().description
        vm.editMode = vm.isStatusEditMode()
      }).catch((error) => {
        next(from)
        vm.$q.notify({
          color: 'negative',
          position: 'top',
          message: error.response.data.error || 'Error when access type update',
          icon: 'report_problem'
        })
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    }
  },
  methods: {
    ...mapActions(['loadStatus', 'createStatus', 'updateStatus', 'deleteStatus']),
    ...mapGetters(['currentStatus', 'isStatusEditMode', 'userCan']),
    save () {
      if (this.editMode) {
        this.updateStatus({
          id: this.currentStatus().id,
          value: this.status
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Role created'
          })
          this.$router.push({ name: 'default-table-statuses' })
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Loading failed',
            icon: 'report_problem'
          })
        })
      } else {
        this.createStatus({
          value: this.status
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Role created'
          })
          this.$router.push({ name: 'default-table-statuses' })
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Loading failed',
            icon: 'report_problem'
          })
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
          this.deleteStatus(this.status.id).then((response) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: response.data.message
            })
            this.$router.push({ name: 'default-table-statuses' })
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
