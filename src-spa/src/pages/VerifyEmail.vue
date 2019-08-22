<template>
  <q-page class="flex flex-center">
    <div class="q-pa-md full-width" style="max-width: 400px">
      <q-form ref="formMain" @submit.prevent="handleRegister" class="q-gutter-md">
      </q-form>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'VerifyEmail',
  data () {
    return {}
  },
  mounted () {
    const verifyUrl = this.$route.query.queryURL
    this.$axios.get(verifyUrl).then((res) => {
      console.log(res)
    }).catch((err) => {
      console.log(err)
    })
  }
}
</script>

<style scoped>

</style>
