<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="login" class="q-gutter-md">
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
            <q-btn label=" Login " type="submit" color="primary" class="full-width q-mt-md"><q-icon name="mdi-arrow-top-right-thick" /></q-btn>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <q-btn label=" Forget Password " color="primary" flat class="q-ml-sm justify-start"><q-icon name="mdi-lock-reset" /></q-btn>
          </div>
          <div class="col-4">
            <q-btn label=" Register " color="primary" flat class="q-ml-sm justify-end" @click.prevent="register" >
              <q-icon name="mdi-account-plus" />
            </q-btn>
          </div>
          <q-dialog v-model="medium" @show="shown" @hide="isShowing = false">
            <q-card style="width: 700px; max-width: 80vw;">
              <q-card-section>
                <div class="text-h6">medium</div>
              </q-card-section>

              <q-card-section>
                Click/Tap on the backdrop.
              </q-card-section>

              <q-card-actions align="right" class="bg-white text-teal">
                <q-btn flat label="OK" v-close-popup />
              </q-card-actions>
            </q-card>
          </q-dialog>
        </div>
      </q-form>
    </div>
  </q-page>
</template>

<style>
</style>

<script>
export default {
  data () {
    return {
      username: null,
      password: null,
      medium: false
    }
  },
  methods: {
    login () {
      let username = this.username
      let password = this.password
      this.$store.dispatch('login', { username, password })
        .then(() => { this.$router.push('/') })
        .catch((error) => {
          if (error.response.status === 500) {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: 'Loading failed',
              icon: 'report_problem'
            })
          } else { console.log(error.response.data) }
        })
    },
    register () {
      this.$router.push('/register')
    },
    shown () {
      this.isShowing = true
    }
  }
}
</script>
