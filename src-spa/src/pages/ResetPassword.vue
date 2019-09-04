<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="handleForgotPassword" class="q-gutter-md">
        <div class="row">
          <div class="col">
            <q-input
              ref="email"
              name="email"
              outlined
              v-model="email"
              label="Email *"
              v-validate="'required|email'"
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
            <q-btn :loading="resetProgress" label=" Reset password " color="primary" type="submit" class="full-width q-mt-md" >
              <q-icon name="mdi-lock-reset" />
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
import { mapActions } from 'vuex'

export default {
  name: 'ResetPassword',
  data () {
    return {
      email: '',
      resetProgress: false
    }
  },
  methods: {
    ...mapActions(['forgotPassword']),
    handleForgotPassword () {
      let email = this.email
      this.resetProgress = true
      this.forgotPassword(email)
        .then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: resp.data.message,
            icon: 'report_problem'
          })
          this.resetProgress = false
          this.$router.push('/login')
        })
        .catch((error) => {
          if (error.response.status === 402) {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: error.response.data.message,
              icon: 'report_problem'
            })
          } else {
            this.$q.notify({
              color: 'negative',
              position: 'top',
              message: [
                error.response.data.message,
                error.response.data.errors.email
              ].join('. '),
              icon: 'report_problem'
            })
          }
          this.resetProgress = false
        })
    },
    login () {
      this.$router.push('/login')
    }
  }
}
</script>
