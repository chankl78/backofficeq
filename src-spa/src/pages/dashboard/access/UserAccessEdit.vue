<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm" v-if="havePermissions">
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
                            v-model="status"
                            :options="statusesList"
                            label="Status"
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
                <q-page-sticky position="bottom-right" :offset="[18, 18]">
                    <q-btn fab color="primary" icon="mdi-check" @click="save" class="q-mr-sm"/>
                    <q-btn fab to="/user-access" icon="mdi-cancel"/>
                </q-page-sticky>
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
      status: {},
      accessType: {},
      typesList: [],
      rolesList: [],
      statusesList: [],
      havePermissions: false
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      let id = vm.$router.currentRoute.params.id
      if (id) {
        vm.loadUser({ id: id }).then((resp) => {
          vm.havePermissions = true
          vm.user = JSON.parse(JSON.stringify(vm.currentUser()))
          if (vm.user.roles) {
            let _role = vm.user.roles[0]
            vm.role = {
              id: _role.id,
              label: _role.description,
              value: _role.name
            }
          }
          if (vm.user.access_types) {
            let _type = vm.user.access_types.length ? vm.user.access_types[0] : false
            if (_type) {
              vm.accessType = {
                id: _type.id,
                label: _type.description,
                value: _type.name
              }
            }
          }
          if (vm.user.status) {
            let _status = vm.user.status.length ? vm.user.status[0] : false
            if (_status) {
              vm.status = {
                id: _status.id,
                label: _status.description,
                value: _status.name
              }
            }
          }
          vm.rolesList = vm.availableRoles()
          vm.typesList = vm.accessTypeList()
          vm.statusesList = vm.availableStatuses()
        }).catch((error) => {
          vm.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Error when access type update',
            icon: 'report_problem'
          })
          next(from)
        })
      } else {
        next(from)
      }
    })
  },
  methods: {
    ...mapActions(['loadUser', 'updateUser']),
    ...mapGetters(['currentUser', 'availableRoles', 'accessTypeList', 'availableStatuses']),
    save () {
      this.updateUser({
        user: this.user,
        role: this.role,
        access_type: this.accessType,
        status: this.status
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
