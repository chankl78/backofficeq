<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>{{ this.isEditMode() ? 'Edit role' : 'Create role'}}</h4>
            <q-form ref="roleForm" class="q-pa-md">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <q-input
                            name="value"
                            v-model="role"
                            label="Role Name"
                            class="q-gutter-md q-mr-md"
                            lazy-rules
                            :rules="[ val => val && val.length > 0 || 'Please type something']"
                        />
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <q-select
                            name="resource"
                            v-model="resource"
                            :options="resources"
                            label="Resource"
                            class="q-gutter-md q-mr-md"
                        >
                            <template v-slot:option="scope">
                                <q-item
                                    v-bind="scope.itemProps"
                                    v-on="scope.itemEvents"
                                >
                                    <q-item-section>
                                        <q-item-label v-html="scope.opt.label" />
                                        <q-item-label caption>{{ scope.opt.description }} ( {{ scope.opt.value }} )</q-item-label>
                                    </q-item-section>
                                </q-item>
                            </template>
                        </q-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <h6>Permissions list</h6>
                        <q-option-group
                            :options="permissions"
                            label="Permissions list"
                            type="toggle"
                            v-model="selectedPermissions"
                        />
                    </div>
                </div>
                <hr/>
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
      resource: {},
      resources: [],
      permissions: [],
      selectedPermissions: [],
      editMode: false
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadRole', 'createRole', 'updateRole']),
    ...mapGetters(['currentRole', 'permissionList', 'resourcesList', 'isEditMode']),
    load () {
      let id = this.$router.currentRoute.params.id || 'new'
      this.loadRole({ id: id }).then((resp) => {
        this.permissions = this.permissionList()
        this.resources = this.resourcesList()
        let _resource = this.currentRole().resource.length ? this.currentRole().resource[0] : false
        if (_resource) {
          this.resource = {
            id: _resource.id,
            label: _resource.resource,
            value: _resource.code,
            description: _resource.resourcegroupcode
          }
        }
        console.log(this.resource)
        if (id !== 'new') {
          this.role = this.currentRole().description
          this.selectedPermissions = this.currentRole().permissions.map((role) => {
            return role.name
          })
        }
      })
    },
    save () {
      if (this.isEditMode()) {
        this.updateRole({
          id: this.currentRole().id,
          value: this.role,
          permissions: this.selectedPermissions,
          resource: this.resource
        }).then((resp) => {
          this.$router.push('/role-access')
        })
      } else {
        this.createRole({
          value: this.role,
          permissions: this.selectedPermissions,
          resource: this.resource
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Role created',
            icon: 'report_problem'
          })
          this.$router.push('/role-access')
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
}
</script>
