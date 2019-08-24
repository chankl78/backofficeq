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
        <q-list v-for="(menuItem, index) in menuList" :key="index">
          <q-item clickable :to="{ name: menuItem.to }" v-ripple exact>
            <q-item-section avatar>
              <q-icon :name="menuItem.icon" />
            </q-item-section>
            <q-item-section>{{ menuItem.label }}</q-item-section>
          </q-item>
          <q-separator v-if="menuItem.separator" />
        </q-list>
        <q-list>
          <q-item clickable @click="logout" v-ripple>
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
      menuList: [
        {
          icon: 'mdi-home',
          to: 'home',
          label: 'Home',
          separator: false
        },
        {
          icon: 'mdi-account',
          to: 'profile',
          label: 'Profile',
          separator: false
        },
        {
          icon: 'mdi-settings',
          to: 'settings',
          label: 'Settings',
          separator: true
        }
      ]
    }
  },
  computed: {
    ...mapState({
      menu: state => state.menuList
    })
  },
  created () {
    this.loadDashboard().then((resp) => {
      if (resp.status === 401) {
        this.$router.push('/login')
      }
    }).catch((err) => {
      console.log(err)
      this.$router.push('/login')
    })
  },
  methods: {
    ...mapActions([
      'loadDashboard',
      'logout'
    ]),
    handleLogout () {
      this.logout().then(() => { this.$router.push('/login') })
    }
  }
}
</script>
