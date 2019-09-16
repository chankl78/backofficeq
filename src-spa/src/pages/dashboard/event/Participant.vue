<template>
    <q-page padding>
        <div class="q-pa-md q-gutter-sm">
            <q-splitter v-model="splitterModel">
                <template v-slot:before>
                    <q-tabs
                        v-model="tab"
                        vertical
                        class="text-teal"
                    >
                        <q-tab name="info" icon="mdi-view-dashboard-outline" label="Participant info" />
                        <q-tab name="pdpa" icon="mdi-card-text-outline" label="PDPA" />
                        <q-tab name="org_detail" icon="mdi-card-text-outline" label="Organisation Detail" />
                        <q-tab name="reg_detail" icon="mdi-card-text-outline" label="Registration Detail" />
                        <q-tab name="exam_info" icon="mdi-card-text-outline" label="Study Exam Info" />
                        <q-tab name="session_and_language" icon="mdi-card-text-outline" label="Session & Language" />
                        <q-tab name="introducer_info" icon="mdi-card-text-outline" label="Introducer Info" />
                        <q-tab name="emergency_contact_info" icon="mdi-card-text-outline" label="Emergency Contact Info" />
                        <q-tab name="training_commitment" icon="mdi-card-text-outline" label="Training Commitment" />
                        <q-tab name="injury_info" icon="mdi-card-text-outline" label="Injury Info" />
                        <q-tab name="health_screening" icon="mdi-card-text-outline" label="Health Screening" />
                        <q-tab name="drugs_n_dietary" icon="mdi-card-text-outline" label="Drugs & Dietary" />
                        <q-tab name="audition_info" icon="mdi-card-text-outline" label="Audition Info" />
                        <q-tab name="costume_measurement" icon="mdi-card-text-outline" label="Costume Measurement" />
                        <q-tab name="official_remarks" icon="mdi-card-text-outline" label="Official Remarks" />
                        <q-tab name="history" icon="mdi-card-text-outline" label="History" />
                    </q-tabs>
                </template>
                <template v-slot:after>
                    <q-tab-panels
                        v-model="tab"
                        animated
                        transition-prev="jump-up"
                        transition-next="jump-up"
                    >
                        <q-tab-panel name="info">
                            <q-card class="relative-position row">
                                <q-card-section class="col-12">
                                    <div class="text-h4 q-mb-md">Participant info</div>
                                </q-card-section>
                                <q-card-section class="col-md-6 col-sm-12">
                                    <q-list>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Name</q-item-label>
                                                <q-item-label lines="2">{{ participant.name }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Chinese Name</q-item-label>
                                                <q-item-label lines="2">{{ participant.chinese_name }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Date of birth</q-item-label>
                                                <q-item-label lines="2">{{ participant.birth_date }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Gender</q-item-label>
                                                <q-item-label lines="2">{{ participant.gender }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                    </q-list>
                                </q-card-section>
                                <q-card-section class="col-md-6 col-sm-12">
                                    <q-list>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Nationality</q-item-label>
                                                <q-item-label lines="2">{{ participant.nationality }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Country of birth</q-item-label>
                                                <q-item-label lines="2">{{ participant.birth_country }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Race</q-item-label>
                                                <q-item-label lines="2">{{ participant.race }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Occupation</q-item-label>
                                                <q-item-label lines="2">{{ participant.occupation }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                    </q-list>
                                </q-card-section>
                            </q-card>
                        </q-tab-panel>
                    </q-tab-panels>
                    <q-tab-panels
                        v-model="tab"
                        animated
                        transition-prev="jump-up"
                        transition-next="jump-up"
                    >
                        <q-tab-panel name="pdpa">
                            <q-card class="relative-position row">
                                <q-card-section class="col-12">
                                    <div class="text-h4 q-mb-md">PDPA</div>
                                </q-card-section>
                                <q-card-section class="col-md-6 col-sm-12">
                                    <q-list>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Nric</q-item-label>
                                                <q-item-label lines="2">{{ participant.nric }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Email</q-item-label>
                                                <q-item-label lines="2">{{ participant.email }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Phone</q-item-label>
                                                <q-item-label lines="2">{{ participant.tel }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Mobile</q-item-label>
                                                <q-item-label lines="2">{{ participant.mobile }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                    </q-list>
                                </q-card-section>
                                <q-card-section class="col-md-6 col-sm-12">
                                    <q-list>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Building name</q-item-label>
                                                <q-item-label lines="2">{{ participant.address.building }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Address</q-item-label>
                                                <q-item-label lines="2">{{ participant.address.address }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Unit No.</q-item-label>
                                                <q-item-label lines="2">{{ participant.address.unit }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                        <q-item>
                                            <q-item-section>
                                                <q-item-label caption>Postal code</q-item-label>
                                                <q-item-label lines="2">{{ participant.address.postal_code }}</q-item-label>
                                            </q-item-section>
                                        </q-item>
                                    </q-list>
                                </q-card-section>
                            </q-card>
                        </q-tab-panel>
                    </q-tab-panels>
                </template>
            </q-splitter>
        </div>
    </q-page>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'Participant',
  data () {
    return {
      splitterModel: 20,
      tab: 'info'
    }
  },
  beforeRouteEnter (to, from, next) {
    next(vm => {
      vm.loadParticipant(to.params).then((resp) => {
        vm.loading = false
      })
    })
  },
  computed: {
    allowed (arr) {
      return this.userCan(arr)
    },
    participant () {
      return this.currentParticipant().member
    }
  },
  methods: {
    ...mapActions(['loadParticipant']),
    ...mapGetters(['currentParticipant', 'userCan'])
  }
}
</script>
