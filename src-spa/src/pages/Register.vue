<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="register" class="q-gutter-md">
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
            <q-input
              ref="password"
              outlined
              v-model="password"
              label="Password *"
              lazy-rules
              :rules="[ val => val && val.length > 0 || 'Password is required']"
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-input
              ref="passwordRepeat"
              outlined
              v-model="passwordRepeat"
              label="Password confirm *"
              lazy-rules
            ></q-input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <q-btn label=" Register " type="submit" color="primary" class="full-width q-mt-md">
              <q-icon name="mdi-arrow-top-right-thick" />
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
      passwordRepeat: ''
    }
  },
  methods: {
    login () {
      this.$router.push('/login')
    }
  }
}
</script>

<style scoped>

</style>
