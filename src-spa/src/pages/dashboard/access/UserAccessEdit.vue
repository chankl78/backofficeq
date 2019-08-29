<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>Edit user</h4>
            <q-form ref="roleForm" class="q-pa-md">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <q-input
                            name="name"
                            v-model="user.name"
                            label="Name"
                            lazy-rules
                            class="q-gutter-md q-mr-md"
                            :rules="[ val => val && val.length > 0 || 'Please type something']"
                        />
                        <q-input
                            name="username"
                            v-model="user.username"
                            label="Username"
                            lazy-rules
                            class="q-gutter-md q-mr-md"
                            :rules="[ val => val && val.length > 0 || 'Please type something']"
                        />
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <q-input
                            name="email"
                            v-model="user.email"
                            label="Email"
                            lazy-rules
                            class="q-gutter-md q-mr-md"
                            :rules="[ val => val && val.length > 0 || 'Please type something']"
                        />
                        <q-select
                            name="status"
                            v-model="user.status"
                            :options="statusOptions"
                            label="Status"
                            class="q-gutter-md q-mr-md"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <q-select
                            name="role"
                            v-model="role"
                            :options="rolesList"
                            label="Role"
                            class="q-gutter-md q-mr-md"
                        >
                            <template v-slot:option="scope">
                                <q-item
                                    v-bind="scope.itemProps"
                                    v-on="scope.itemEvents"
                                >
                                    <q-item-section>
                                        <q-item-label v-html="scope.opt.label" />
                                        <q-item-label caption>( system name: {{ scope.opt.value }} )</q-item-label>
                                    </q-item-section>
                                </q-item>
                            </template>
                        </q-select>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <q-select
                            name="accessType"
                            v-model="accessType"
                            :options="typesList"
                            label="Role"
                            class="q-gutter-md q-mr-md"
                        >
                            <template v-slot:option="scope">
                                <q-item
                                    v-bind="scope.itemProps"
                                    v-on="scope.itemEvents"
                                >
                                    <q-item-section>
                                        <q-item-label v-html="scope.opt.label" />
                                        <q-item-label caption>( system name: {{ scope.opt.value }} )</q-item-label>
                                    </q-item-section>
                                </q-item>
                            </template>
                        </q-select>
                    </div>
                </div>
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
      user: {},
      role: {},
      accessType: {},
      typesList: [],
      rolesList: []
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadUser', 'updateUser']),
    ...mapGetters(['currentUser', 'availableRoles', 'accessTypeList']),
    load () {
      let id = this.$router.currentRoute.params.id
      if (id) {
        this.loadUser({ id: id }).then((resp) => {
          this.user = this.currentUser()
          if (this.user.roles) {
            let _role = this.user.roles[0]
            this.role = {
              id: _role.id,
              label: _role.description,
              value: _role.name
            }
          }
          if (this.user.access_types) {
            let _type = this.user.access_types.length ? this.user.access_types[0] : false
            if (_type) {
              this.accessType = {
                id: _type.id,
                label: _type.description,
                value: _type.name
              }
            }
          }
          this.rolesList = this.availableRoles()
          this.typesList = this.accessTypeList()
        })
      }
    },
    save () {
      this.updateUser({
        user: this.user,
        role: this.role,
        access_type: this.accessType
      }).then((resp) => {
        this.$q.notify({
          color: 'positive',
          position: 'top',
          message: resp.data.message || 'Role created',
          icon: 'report_problem'
        })
        this.$router.push('/user-access')
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
