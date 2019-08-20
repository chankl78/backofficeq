<template>

<div class="q-pa-md" style="max-width: 400px">

      <q-form
        @submit="onSubmit"
        class="q-gutter-md"
      >
        <q-input
          filled
          v-model="username"
          label="Your username"
          hint="Username"
        ></q-input>

        <q-input
          filled
          v-model="password"
          label="Password"
          hint="Password"
        ></q-input>

        <div>
          <q-btn label="Submit" type="submit" color="primary"></q-btn>
          <q-btn label="Reset" type="reset" color="primary" flat class="q-ml-sm" ></q-btn>
        </div>
      </q-form>

    </div>

</template>

<script>

export default {

  data () {
    return {
      username: null,
      password: null
    }
  },

  methods: {
    /**
     * @this {Vue}
     */
    onSubmit () {
      this.$axios.post('/api/submit', {
        username: this.username,
        password: this.password
      })
        .then((response) => {
          console.log(response.data)
          this.$router.push('anotherpage')
        })
    }
  }
}
</script>

<style>
</style>
