<template>
  <q-layout view="hHh lpR fFf">

    <q-header reveal elevated class="bg-primary text-white">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="drawerLeft = !drawerLeft" />

        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
          </q-avatar>
          {{ resourceTitle }}
        </q-toolbar-title>
        <q-btn stretch flat label="Logout" @click.prevent="handleLogout" />
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="drawerLeft"
      side="left"
      elevated
      show-if-above
      v-if="loading === false"
    >
      <q-scroll-area class="fit">
        <q-list v-for="(menuItem, index) in menu" :key="index">
          <q-item v-if="!menuItem.expandable" clickable :to="{ name: menuItem.to }" @click="callFunc(menuItem, index)" v-ripple exact>
            <q-item-section avatar>
              <q-icon :name="menuItem.icon" :color="currentRoute === menuItem.to ? 'primary' : 'grey-10' " />
            </q-item-section>
            <q-item-section :class="menuItem.class || ''">
                <q-item-label lines="1">
                    {{ menuItem.label }}
                </q-item-label>
                <q-item-label caption v-if="menuItem.caption" :class="menuItem.captionClass || ''">{{ menuItem.caption }}</q-item-label>
            </q-item-section>
          </q-item>
          <q-expansion-item
            v-if="menuItem.expandable"
            expand-separator
            :icon="menuItem.icon"
            :label="menuItem.label"
            caption=""
            default-closed
          >
            <q-list v-for="(menuItem2, index2) in menuItem.children" :key="index2">
              <q-item
                v-if="!menuItem2.expandable"
                clickable
                v-ripple
                exact
                :inset-level="menuItem2.level"
                :to="{ name: menuItem2.to }"
              >
                <q-item-section avatar v-if="menuItem2.icon">
                  <q-icon :name="menuItem2.icon" />
                </q-item-section>
                <q-item-section>{{ menuItem2.label }}</q-item-section>
              </q-item>
              <q-expansion-item
                v-if="menuItem2.expandable"
                expand-separator
                :icon="menuItem2.icon"
                :label="menuItem2.label"
                caption=""
                default-closed
                :header-inset-level="menuItem2.level"
              >
                <q-list v-for="(menuItem3, index3) in menuItem2.children" :key="index3">
                  <q-item clickable v-ripple exact :inset-level="menuItem3.level" :to="{ name: menuItem3.to }">
                    <q-item-section avatar v-if="menuItem3.icon">
                      <q-icon :name="menuItem3.icon" />
                    </q-item-section>
                    <q-item-section>{{ menuItem3.label }}</q-item-section>
                  </q-item>
                </q-list>
              </q-expansion-item>
            </q-list>
          </q-expansion-item>
          <q-separator v-if="menuItem.separator" />
        </q-list>
        <q-list>
          <q-item clickable @click="handleLogout" v-ripple>
            <q-item-section avatar>
              <q-icon :name="'mdi-logout'" />
            </q-item-section>
            <q-item-section>Logout</q-item-section>
          </q-item>
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>

    <q-footer reveal elevated class="row bg-grey-8 text-white">
      <q-toolbar class="col-4">
        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
          </q-avatar>
          SSASoft - Backoffice
        </q-toolbar-title>
      </q-toolbar>
      <q-toolbar class="col-8" ref="footerToolbar">
        <q-space/>
        <template v-slot:footer></template>
      </q-toolbar>
    </q-footer>

  </q-layout>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex'

export default {
  data () {
    return {
      drawerLeft: true,
      loading: true,
      menu: []
    }
  },
  computed: {
    ...mapState({
      user: state => state.user
    }),
    resourceTitle () {
      return this.$route.meta.title
    },
    currentRoute () {
      return this.$route.name
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadDashboard().then((resp) => {
        if (resp.status === 401) {
          vm.$router.push('/login')
        }
        vm.loading = false
        vm.menu = vm.dashboardMenu()
      }).catch(() => {
        vm.$router.push('/login')
      })
    })
  },
  methods: {
    ...mapActions([
      'loadDashboard',
      'logout',
      'fetchAccessToken',
      'resendVerificationEmail'
    ]),
    ...mapGetters(['dashboardMenu']),
    handleLogout () {
      this.logout().then(() => { this.$router.push('/login') })
    },
    resendVerification (params = {}, index = null) {
      if (params.email) {
        this.resendVerificationEmail(params.email).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message
          })
        }).catch((err) => {
          this.$q.notify({
            color: 'negative',
            position: 'top',
            message: err.response.data.error || 'Error when resend...',
            icon: 'report_problem'
          })
        })
      }
    },
    callFunc (item, index) {
      let func = item.callFunc
      if (item.callFunc) {
        let params = item.callFuncParam || null
        let fn = this[func]
        if (fn) {
          fn(params, index)
        }
      }
    }
  }
}
</script>
