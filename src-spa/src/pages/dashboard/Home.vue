<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
          <p>HOME</p>
        </div>
    </q-page>
</template>

<script>
import { mapState } from 'vuex'

export default {
  name: 'Home',
  computed: {
    ...mapState({
      user: state => state.user
    })
  }
}
</script>
