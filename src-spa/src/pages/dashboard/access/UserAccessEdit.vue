<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>Edit user</h4>
            <q-form ref="roleForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="name"
                    v-model="user.name"
                    label="Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <q-input
                    name="username"
                    v-model="user.username"
                    label="Username"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <q-input
                    name="email"
                    v-model="user.email"
                    label="Email"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <q-select
                    name="status"
                    v-model="user.status"
                    :options="statusOptions"
                    label="Status"
                />
                <div class="q-mt-md">
                    <q-btn label="Save" type="submit" color="primary" @click="save"/>
                    <q-btn label="Cancel" to="/user-access" color="primary" flat class="q-ml-sm" />
                </div>
            </q-form>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'UserAccessEdit',
  data () {
    return {
      loading: false,
      statusOptions: [
        'Active',
        'Inactive',
        'Banned'
      ],
      user: {}
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadUser', 'updateUser']),
    ...mapGetters(['currentUser']),
    load () {
      let id = this.$router.currentRoute.params.id
      if (id) {
        this.loadUser({ id: id }).then((resp) => {
          this.user = this.currentUser()
          console.log(this.user)
        })
      }
    },
    save () {
      this.updateUser(this.user).then((resp) => {
        this.$router.push('/user-access')
      })
    }
  }
}
</script>
