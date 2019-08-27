<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>{{ this.editMode ? 'Edit role' : 'Create role'}}</h4>
            <q-form ref="roleForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="value"
                    v-model="role"
                    label="Role Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <div>
                    <q-btn label="Save" type="submit" color="primary" @click="save"/>
                    <q-btn label="Cancel" to="/role-access" color="primary" flat class="q-ml-sm" />
                </div>
            </q-form>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'RoleAccessEdit',
  data () {
    return {
      loading: false,
      role: '',
      editMode: false
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadRole', 'createRole', 'updateRole']),
    ...mapGetters(['currentRole']),
    load () {
      let id = this.$router.currentRoute.params.id
      if (id) {
        this.loadRole({ id: id }).then((resp) => {
          this.role = this.currentRole().value
          this.editMode = true
        })
      }
    },
    save () {
      if (this.editMode) {
        this.updateRole({
          id: this.currentRole().id,
          value: this.role
        }).then((resp) => {
          this.$router.push('/role-access')
        })
      } else {
        this.createRole({
          value: this.role
        }).then((resp) => {
          this.$router.push('/role-access')
        })
      }
    }
  }
}
</script>
