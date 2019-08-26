<template>
  <q-layout view="hHh lpR fFf">

    <q-header reveal elevated class="bg-primary text-white">
      <q-toolbar>
        <q-btn dense flat round icon="menu" @click="drawerLeft = !drawerLeft" />

        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
          </q-avatar>
          Title
        </q-toolbar-title>
        <q-btn stretch flat label="Logout" @click.prevent="handleLogout" />
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="drawerLeft"
      side="left"
      elevated
      show-if-above
    >
      <q-scroll-area class="fit">
        <q-list v-for="(menuItem, index) in dashboardMenu" :key="index">
          <q-item v-if="!menuItem.expandable" clickable :to="{ name: menuItem.to }" v-ripple exact>
            <q-item-section avatar>
              <q-icon :name="menuItem.icon" />
            </q-item-section>
            <q-item-section>{{ menuItem.label }}</q-item-section>
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

    <q-footer reveal elevated class="bg-grey-8 text-white">
      <q-toolbar>
        <q-toolbar-title>
          <q-avatar>
            <img src="https://cdn.quasar.dev/logo/svg/quasar-logo.svg">
          </q-avatar>
          SSASoft - Backoffice
        </q-toolbar-title>
      </q-toolbar>
    </q-footer>

  </q-layout>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  data () {
    return {
      drawerLeft: true,
      dashboardMenu: []
    }
  },
  computed: {
    ...mapState({
      user: state => state.user
    })
  },
  created () {
    this.loadDashboard().then((resp) => {
      if (resp.status === 401) {
        this.$router.push('/login')
      }
      this.dashboardMenu = resp.data.menu
    }).catch((err) => {
      console.log(err)
      this.$router.push('/login')
    })
  },
  methods: {
    ...mapActions([
      'loadDashboard',
      'logout',
      'fetchAccessToken'
    ]),
    handleLogout () {
      this.logout().then(() => { this.$router.push('/login') })
    }
  }
}
</script>
