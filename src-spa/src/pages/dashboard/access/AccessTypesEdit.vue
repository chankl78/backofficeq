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
                <div>
                    <q-btn label="Save" type="submit" color="primary" @click="save"/>
                    <q-btn label="Cancel" to="/default-table/access-types" color="primary" flat class="q-ml-sm" />
                </div>
            </q-form>
        </div>
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
  methods: {
    ...mapActions(['loadType', 'createType', 'updateType']),
    ...mapGetters(['currentType', 'isTypeEditMode']),
    save () {
      if (this.editMode) {
        this.updateType({
          id: this.currentType().id,
          value: this.type
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Access type updated'
          })
          this.$router.push('/default-table/access-types')
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Error when access type update',
            icon: 'report_problem'
          })
          this.$router.push('/default-table/access-types')
        })
      } else {
        this.createType({
          value: this.type
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Access type created'
          })
          this.$router.push('/default-table/access-types')
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Error when access type create',
            icon: 'report_problem'
          })
          this.$router.push('/default-table/access-types')
        })
      }
    }
  }
}
</script>
