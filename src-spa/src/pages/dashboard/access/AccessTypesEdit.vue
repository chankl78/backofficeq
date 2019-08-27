<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <h4>{{ this.editMode ? 'Edit access type' : 'Create access type'}}</h4>
            <q-form ref="typeForm" class="q-pa-md" style="max-width: 400px">
                <q-input
                    name="value"
                    v-model="type"
                    label="Access type Name"
                    lazy-rules
                    :rules="[ val => val && val.length > 0 || 'Please type something']"
                />
                <div>
                    <q-btn label="Save" type="submit" color="primary" @click="save"/>
                    <q-btn label="Cancel" to="/default-table/access-types" color="primary" flat class="q-ml-sm" />
                </div>
            </q-form>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'AccessTypeEdit',
  data () {
    return {
      loading: false,
      type: '',
      editMode: false
    }
  },
  created () {
    this.load()
  },
  methods: {
    ...mapActions(['loadType', 'createType', 'updateType']),
    ...mapGetters(['currentType']),
    load () {
      let id = this.$router.currentRoute.params.id
      if (id) {
        this.loadType({ id: id }).then((resp) => {
          this.type = this.currentType().value
          this.editMode = true
        })
      }
    },
    save () {
      if (this.editMode) {
        this.updateType({
          id: this.currentType().id,
          value: this.type
        }).then((resp) => {
          this.$router.push('/default-table/access-types')
        })
      } else {
        this.createType({
          value: this.type
        }).then((resp) => {
          this.$router.push('/default-table/access-types')
        })
      }
    }
  }
}
</script>
