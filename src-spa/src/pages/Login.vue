<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="handleLogin" class="q-gutter-md">
        <div class="row">
          <div class="col">
            <q-input
              ref="username"
              outlined
              v-model="username"
              label="Username *"
              lazy-rules
              :rules="[ val => val && val.length > 0 || 'Username is required']"
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-input
              ref="password"
              outlined
              v-model="password"
              label="Password *"
              type="password"
              lazy-rules
              :rules="[
                val => val !== null && val !== '' || 'Password is required',
                val => val && val.length > 4 || 'Min password length is 4 chars'
              ]"
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-btn :loading="loginProgress" label=" Login " type="submit" color="primary" class="full-width q-mt-md">
              <q-icon name="mdi-arrow-top-right-thick" />
              <template v-slot:loading>
                SIGNING IN...
              </template>
            </q-btn>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <q-btn label=" Forget Password " color="primary" flat class="q-ml-sm justify-start" @click.prevent="handleResetPassword">
              <q-icon name="mdi-lock-reset" />
            </q-btn>
          </div>
          <div class="col-4">
            <q-btn label=" Register " color="primary" flat class="q-ml-sm justify-end" @click.prevent="handleRegister" >
              <q-icon name="mdi-account" />
            </q-btn>
          </div>
        </div>
      </q-form>
    </div>
  </q-page>
</template>

<style>
</style>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  data () {
    return {
      username: null,
      password: null,
      medium: false,
      loginProgress: false
    }
  },
  computed: {
    ...mapState({
      user: state => state.user
    })
  },
  methods: {
    ...mapActions(['login']),
    handleLogin () {
      this.loginProgress = true
      let username = this.username
      let password = this.password
      this.login({ username, password })
        .then(() => { this.$router.push('/') })
        .catch((error) => {
          if (error.response.status === 401) {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.message || 'Bad credentials',
              icon: 'report_problem'
            })
          } else {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.message || 'Loading failed',
              icon: 'report_problem'
            })
          }
        })
        .finally(() => {
          this.loginProgress = false
        })
    },
    handleRegister () {
      this.$router.push('/register')
    },
    handleResetPassword () {
      this.$router.push('/reset-password')
    }
  }
}
</script>
