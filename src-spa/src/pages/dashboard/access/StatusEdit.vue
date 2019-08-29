<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>{{ this.editMode ? 'Edit status' : 'Create status'}}</h4>
            <q-form ref="statusForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="value"
                    v-model="status"
                    label="Status Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <div>
                    <q-btn label="Save" type="submit" color="primary" @click="save"/>
                    <q-btn label="Cancel" to="/default-table/statuses" color="primary" flat class="q-ml-sm" />
                </div>
            </q-form>
        </div>
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
      editMode: false
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadStatus', 'createStatus', 'updateStatus']),
    ...mapGetters(['currentStatus', 'isStatusEditMode']),
    load () {
      let id = this.$router.currentRoute.params.id || 'new'
      this.loadStatus({ id: id }).then((resp) => {
        this.status = this.currentStatus().description
        this.editMode = this.isStatusEditMode()
      })
    },
    save () {
      if (this.editMode) {
        this.updateStatus({
          id: this.currentStatus().id,
          value: this.status
        }).then((resp) => {
          this.$router.push('/default-table/statuses')
        })
      } else {
        this.createStatus({
          value: this.status
        }).then((resp) => {
          this.$router.push('/default-table/statuses')
        })
      }
    }
  }
}
</script>
