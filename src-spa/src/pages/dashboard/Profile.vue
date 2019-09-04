<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <div class="row">
                <div class="col-md-6 col-xs-12 q-pa-md">
                    <h5 class="q-dialog__title">Profile</h5>
                    <q-input type="text" label="Name" v-model="user.name" />
                    <q-input type="text" label="Email" v-model="user.email" />
                    <q-input type="text" label="Phone" mask="(###) ### - ####" hint="(###) ### - ####" v-model="user.phone" />
                    <q-input type="text" label="Mobile" mask="(###) ### - ####" hint="(###) ### - ####" v-model="user.mobile" />
                    <q-input type="text" borderless label="Created At" disable v-model="user.created_at" />
                    <q-btn :loading="sendingReset" icon="mail" icon-right="send" label="Reset password" @click="handleForgotPassword" class="full-width q-mt-md"/>
                </div>
                <div class="col-md-6 col-xs-12 q-pa-md">
                    <h5 class="q-dialog__title">Activities timeline</h5>
                    <q-infinite-scroll @load="handleLoadActivities" :offset="50">
                        <div v-for="(log, key) in activities" :key="key" class="row">
                            <div class="col-1">
                                <q-icon v-if="log.status == 'Success'" name="mdi-check-circle-outline" color="green" />
                                <q-icon v-if="log.status == 'Warning'" name="mdi-alert-octagon-outline" color="yellow" />
                                <q-icon v-if="log.status == 'Error'" name="mdi-alert-octagon-outline" color="red" />
                            </div>
                            <div class="col-8">
                                {{ log.description }}
                            </div>
                            <div class="col-2">
                                {{ log.created_at }}
                            </div>
                        </div>
                        <template v-slot:loading>
                            <div class="row justify-center q-my-md">
                                <q-spinner-gears color="primary" size="40px" />
                            </div>
                        </template>
                    </q-infinite-scroll>
                </div>
            </div>
        </div>
        <q-page-sticky position="bottom-right" :offset="[18, 18]">
            <q-btn fab color="primary" icon="mdi-check" @click="save" class="q-mr-sm"/>
        </q-page-sticky>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'Profile',
  data () {
    return {
      user: {},
      activities: [],
      activitiesNum: 0,
      sendingReset: false
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadProfile().then((resp) => {
        vm.user = JSON.parse(JSON.stringify(vm.profileDetails()))
        vm.loadActivities(0).then((resp) => {
          vm.activities = vm.profileActivities().map(l => ({
            status: l.status,
            description: l.description,
            created_at: l.created_at
          }))
          vm.activitiesNum = parseInt(resp.count)
        })
      }).catch((err) => {
        console.log(err)
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    }
  },
  methods: {
    ...mapActions(['loadProfile', 'updateProfile', 'loadActivities', 'forgotPassword']),
    ...mapGetters(['currentUser', 'userCan', 'profileDetails', 'profileActivities']),
    handleLoadActivities (index, done) {
      this.loadActivities(index).then((resp) => {
        let activities = this.profileActivities().map(l => ({
          status: l.status,
          description: l.description,
          created_at: l.created_at
        }))
        this.activities = this.activities.concat(activities)
        done(true)
      }).catch((err) => {
        console.log(err)
        done(true)
      })
    },
    handleForgotPassword () {
      if (this.allowed('read')) {
        this.sendingReset = true
        let email = this.user.email
        this.forgotPassword(email).then((resp) => {
          this.$q.notify({
            color: 'positive',
            position: 'top',
            message: 'Password reset link sent'
          })
          this.sendingReset = false
        }).catch((error) => {
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
              message: error.response.data.message,
              icon: 'report_problem'
            })
          }
          this.sendingReset = false
        })
      }
    },
    save () {
      this.updateProfile(this.user).then((resp) => {
        this.$q.notify({
          color: 'positive',
          position: 'top',
          message: resp.data.message || 'User updated',
          icon: 'report_problem'
        })
        this.$router.push({ name: 'profile' })
      }).catch((error) => {
        this.$q.notify({
          color: 'negative',
          position: 'top',
          message: error.response.data.error || 'Update failed',
          icon: 'report_problem'
        })
      })
    }
  }
}
</script>
