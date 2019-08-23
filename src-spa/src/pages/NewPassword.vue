<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <div class="row">
        <div class="col"><h4>{{ resultMessage }}</h4></div>
      </div>
      <div class="row">
        <div class="col">
          <p v-if="newPassword != ''">Your new password is: {{ newPassword }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <q-btn label=" Login " color="primary" class="full-width q-mt-md" @click.prevent="login" >
            <q-icon name="mdi-account" />
          </q-btn>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'NewPassword',
  data () {
    return {
      resultMessage: '',
      newPassword: ''
    }
  },
  mounted () {
    const link = this.$route.query.resetUrl
    this.$store.dispatch('resetPassword', link).then((resp) => {
      if (resp.data.password) {
        this.newPassword = resp.data.password
      }
      this.resultMessage = resp.data.message
    }).catch((err) => {
      this.resultMessage = err.response.data.message
    })
  },
  methods: {
    login () {
      this.$router.push('/login')
    }
  }
}
</script>
