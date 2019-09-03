<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm" v-if="havePermissions">
            <h4>{{ this.isEditMode() ? 'Edit role' : 'Create role'}}</h4>
            <q-form ref="roleForm" class="q-pa-md">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <q-input
                            name="value"
                            v-model="role"
                            label="Role Name"
                            class="q-gutter-md q-mr-md"
                            lazy-rules
                            :rules="[ val => val && val.length > 0 || 'Please type something']"
                        />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <q-select
                            name="resource"
                            v-model="resourceToAdd"
                            :options="resources"
                            label="Resource"
                            class="q-gutter-md q-mr-md"
                            @filter="addResourcesFilter"
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
                            <template v-slot:append="scope">
                                <q-icon name="mdi-plus-circle" @click.stop="addResourceToList" class="cursor-pointer" color="green"/>
                            </template>
                        </q-select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h6>Role Permissions</h6>
                        <q-option-group
                            :options="permissions"
                            label="Permissions list"
                            type="toggle"
                            v-model="selectedPermissions"
                        />
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <h6>Active resources</h6>
                        <q-list bordered separator>
                            <q-item
                                v-for="(res, i) in resource"
                                :key="i"
                                clickable
                                v-ripple
                                :active="selectedRes === i"
                                @click="selectResource(i, res)"
                            >
                                <q-item-section>
                                    <q-item-label>{{ res.label }} (code: {{ res.value }}, group: {{ res.description }})</q-item-label>
                                    <q-item-label caption>{{ res.permissions.map((p) => p.name).join(', ') }}</q-item-label>
                                </q-item-section>
                                <q-item-section avatar>
                                    <q-icon name="cancel" @click.stop="removeResourceFromList(res)" class="cursor-pointer" color="red"/>
                                </q-item-section>
                            </q-item>
                        </q-list>
                    </div>
                </div>
            </q-form>
        </div>
        <q-dialog
            v-model="resourceRolesDialog"
            persistent transition-show="scale"
            transition-hide="scale"
            @before-hide="updateResourceRoles"
        >
            <q-card style="width: 300px">
                <q-card-section>
                    <p class="q-dialog__title">Resource Permissions</p>
                    <q-option-group
                        v-if="selectedResource"
                        :options="permissions"
                        label="Permissions list"
                        type="toggle"
                        v-model="resourcePermissions[selectedResource]"
                    />
                </q-card-section>
                <q-card-actions align="right" class="bg-white text-teal">
                    <q-btn flat label="OK" v-close-popup />
                </q-card-actions>
            </q-card>
        </q-dialog>
        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn v-if="allowed('update')" fab color="primary" icon="mdi-check" @click="save" class="q-mr-sm"/>
            <q-btn v-if="allowed('delete')" fab color="red" icon="mdi-delete" @click="removeRole" class="q-mr-sm"/>
            <q-btn fab to="/role-access" icon="mdi-cancel"/>
        </q-page-sticky>
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
      selectedResource: null,
      resourceToAdd: {},
      resourcePermissions: [],
      resourceRolesDialog: false,
      editMode: false,
      havePermissions: false,
      selectedRes: null
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      let id = vm.$router.currentRoute.params.id || 'new'
      vm.loadRole({ id: id }).then((resp) => {
        vm.havePermissions = true
        vm.permissions = vm.permissionList()
        let _resource = vm.currentRole().resource.length ? vm.currentRole().resource : []
        vm.resources = vm.resourcesList().filter((el) => !_resource.some((r) => el.id === r.id))
        if (_resource) {
          vm.resource = _resource.map((r) => ({
            id: r.id,
            label: r.resource,
            value: r.code,
            description: r.resourcegroupcode,
            permissions: r.permissions
          }))
        }
        if (id !== 'new') {
          vm.role = vm.currentRole().description
          vm.selectedPermissions = vm.currentRole().permissions.map((role) => {
            return role.name
          })
          vm.resourcePermissions = []
        }
      }).catch((error) => {
        next(from)
        vm.$q.notify({
          color: 'negative',
          position: 'top',
          message: error || 'Error when access type update',
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
    ...mapActions(['loadRole', 'createRole', 'updateRole', 'deleteRole']),
    ...mapGetters(['currentRole', 'permissionList', 'resourcesList', 'isEditMode', 'userCan']),
    selectResource (index, row) {
      this.selectedRes = index
      this.selectedResource = row.id
      this.resourceRolesDialog = true
      this.resourcePermissions[row.id] = row.permissions.map((p) => p.name)
    },
    addResourceToList () {
      let add = this.resources.find(r => r.id === this.resourceToAdd.id)
      add.permissions = []
      this.resource.push(add)
      this.resourceToAdd = null
    },
    removeResourceFromList (toRemove) {
      this.resource = this.resource.filter((r) => r.id !== toRemove.id)
      this.resources.push(toRemove)
    },
    addResourcesFilter (val, update) {
      update(() => {
        this.resources = this.resourcesList().filter((el) => !this.resource.some((r) => el.id === r.id))
      })
    },
    updateResourceRoles (evt) {
      if (this.resourcePermissions[this.selectedResource]) {
        this.resource.forEach((res, index) => {
          if (res.id === this.selectedResource) {
            this.resource[index].permissions = this.resourcePermissions[this.selectedResource].map(r => ({
              name: r,
              value: r
            }))
            this.resources = this.resources.filter((el) => el.id !== res.id)
          }
        })
      }
    },
    save () {
      if (this.isEditMode()) {
        this.updateRole({
          id: this.currentRole().id,
          value: this.role,
          permissions: this.selectedPermissions,
          resource: this.resource
        }).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message || 'Role created'
          })
          this.$router.push({ name: 'role-access' })
        }).catch((error) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: error.response.data.error || 'Loading failed',
            icon: 'report_problem'
          })
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
            message: resp.data.message || 'Role created'
          })
          this.$router.push({ name: 'role-access' })
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
    removeRole () {
      if (this.allowed('delete')) {
        this.$q.dialog({
          title: 'Delete Role',
          message: 'Are you sure?',
          cancel: true,
          persistent: true
        }).onOk(data => {
          this.deleteRole(this.currentRole().id).then((response) => {
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: response.data.message
            })
            this.$router.push({ name: 'role-access' })
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
