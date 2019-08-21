<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="resetPassword" class="q-gutter-md">
        <div class="row">
          <div class="col">
            <q-input
              ref="email"
              outlined
              v-model="email"
              label="Email *"
              lazy-rules
              :rules="[ val => val && val.length > 0 || 'Email is required']"
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-btn label=" Reset password " color="primary" type="submit" class="full-width q-mt-md" >
              <q-icon name="mdi-lock-reset" />
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
  name: 'ResetPassword',
  data () {
    return {
      email: ''
    }
  },
  methods: {
    resetPassword () {
      let email = this.email
      console.log(email)
    },
    login () {
      this.$router.push('/login')
    }
  }
}
</script>
