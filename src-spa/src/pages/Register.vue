<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="handleRegister" class="q-gutter-md">
        <div class="row">
          <div class="col">
            <q-input
              ref="email"
              name="email"
              outlined
              v-model="email"
              v-validate="'required|email'"
              label="Email *"
              :error="errors.has('email')"
            >
              <template v-slot:error>
                {{ errors.first('email') }}
              </template>
            </q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-input
              ref="password"
              name="password"
              outlined
              v-model="password"
              label="Password *"
              v-validate="'required|min:6|max:35|confirmed'"
              :error="errors.has('passwordRepeat')"
              type="password"
            >
              <template v-slot:error>
                {{ errors.first('password') }}
              </template>
            </q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-input
              ref="passwordRepeat"
              name="passwordRepeat"
              outlined
              v-model="passwordRepeat"
              label="Password confirm *"
              v-validate="'required|confirmed:password'"
              :error="errors.has('passwordRepeat')"
              type="password"
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-btn :loading="registerProgress" label=" Register " type="submit" color="primary" class="full-width q-mt-md">
              <q-icon name="mdi-arrow-top-right-thick" />
              <template v-slot:loading>
                  PROCESSING...
              </template>
            </q-btn>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-btn label=" Login " color="primary" flat class="full-width q-mt-md" @click.prevent="login" >
              <q-icon name="mdi-account" />
            </q-btn>
          </div>
        </div>
      </q-form>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'Register',
  data () {
    return {
      username: '',
      email: '',
      password: '',
      passwordRepeat: '',
      registerProgress: false
    }
  },
  methods: {
    handleRegister () {
      let data = {
        email: this.email,
        password: this.password,
        password_confirmation: this.passwordRepeat
      }
      this.$validator.validateAll().then((isValid) => {
        this.registerProgress = true
        this.$store.dispatch('register', data)
          .then((resp) => {
            this.registerProgress = false
            this.$q.notify({
              color: 'positive',
              position: 'top',
              message: resp.data.message
            })
            this.$router.push('/login')
          })
          .catch((err) => {
            this.registerProgress = false
            let messages = err.response.data.message
            if (err.response.data.errors) {
              messages = []
              for (let error in err.response.data.errors) {
                messages.push(err.response.data.errors[error][0])
              }
            }
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: messages,
              icon: 'report_problem'
            })
          })
      }).catch(() => {
        this.$q.notify({
          color: 'negative',
          position: 'top',
          message: this.errors.all() || 'Unable to register user',
          icon: 'report_problem'
        })
      })
    },
    login () {
      this.$router.push('/login')
    }
  }
}
</script>
