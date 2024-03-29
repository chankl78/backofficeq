<template>
    <q-page padding onload="">
        <div class="q-pa-md q-gutter-sm" v-if="havePermissions">
            <h4>{{ this.editMode ? 'Edit access type' : 'Create access type'}}</h4>
            <q-form ref="typeForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="value"
                    v-model="type"
                    label="Access type Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
            </q-form>
        </div>
        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn v-if="allowed('update')" fab color="primary" icon="mdi-check" @click="save" class="q-mr-sm"/>
            <q-btn v-if="allowed('delete')" fab color="red" icon="mdi-delete" @click="removeType" class="q-mr-sm"/>
            <q-btn fab to="/default-table/access-types" icon="mdi-cancel"/>
        </q-page-sticky>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'AccessTypeEdit',
  data () {
    return {
      loading: false,
      type: '',
      editMode: false,
      havePermissions: false
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      let id = vm.$router.currentRoute.params.id || 'new'
      vm.loadType({ id: id }).then((resp) => {
        vm.type = vm.currentType().description
        vm.editMode = vm.isTypeEditMode()
        vm.havePermissions = true
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
    ...mapActions(['loadType', 'createType', 'updateType', 'deleteType']),
    ...mapGetters(['currentType', 'isTypeEditMode', 'userCan']),
    save () {
      if (this.editMode) {
        if (this.allowed('update')) {
          this.updateType({
            id: this.currentType().id,
            value: this.type
          }).then((resp) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: resp.data.message || 'Access type updated'
            })
            this.$router.push({ name: 'default-table-access-types' })
          }).catch((error) => {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.error || 'Error when access type update',
              icon: 'report_problem'
            })
            this.$router.push({ name: 'default-table-access-types' })
          })
        }
      } else {
        if (this.allowed('create')) {
          this.createType({
            value: this.type
          }).then((resp) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: resp.data.message || 'Access type created'
            })
            this.$router.push({ name: 'default-table-access-types' })
          }).catch((error) => {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.error || 'Error when access type create',
              icon: 'report_problem'
            })
            this.$router.push({ name: 'default-table-access-types' })
          })
        }
      }
    },
    removeType () {
      if (this.allowed('delete')) {
        this.$q.dialog({
          title: 'Delete Type',
          message: 'Are you sure?',
          cancel: true,
          persistent: true
        }).onOk(data => {
          this.deleteType(this.currentType().id).then((response) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: response.data.message
            })
            this.$router.push({ name: 'default-table-access-types' })
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
