<template>
  <div>
    <form novalidate class="md-layout md-gutter" @submit.prevent="validateTeam">
      <md-card class="md-layout-item md-size-50 md-small-size-100">
        <md-card-header>
          <div class="md-title">Create Team</div>
        </md-card-header>

        <md-card-content>
          <div class="md-layout md-gutter">
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('teamName')">
                <label for="team-name">Team Name</label>
                <md-input name="team-name" id="team-name" v-model="form.teamName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.teamName.required">The team name is required</span>
                <span class="md-error" v-else-if="!$v.form.teamName.minlength">Invalid team name</span>
              </md-field>
            </div>
          </div>
        </md-card-content>

        <md-progress-bar md-mode="indeterminate" v-if="sending" />

        <md-card-actions>
          <md-button type="submit" class="md-raised md-primary" :disabled="sending">Create team</md-button>
        </md-card-actions>
      </md-card>

      <md-snackbar :md-active.sync="userSaved">The user {{ lastUser }} was saved with success!</md-snackbar>
    </form>
  </div>
</template>

<script>
  import { validationMixin } from 'vuelidate'
  import {
    required,
    email,
    minLength,
    maxLength
  } from 'vuelidate/lib/validators'

  export default {
    name: 'FormValidation',
    mixins: [validationMixin],
    data: () => ({
      form: {
        teamName: null,
      },
      userSaved: false,
      sending: false,
      lastUser: null
    }),
    validations: {
      form: {
        teamName: {
          required,
          minLength: minLength(3)
        }
      }
    },
    methods: {
      getValidationClass (fieldName) {
        const field = this.$v.form[fieldName]

        if (field) {
          return {
            'md-invalid': field.$invalid && field.$dirty
          }
        }
      },
      clearForm () {
        this.$v.$reset()
        this.form.teamName = null
      },
      saveUser () {
        this.sending = true
        /* Instead of this timeout, here you can call your API
        window.setTimeout(() => {
          this.userSaved = true
          this.sending = false
          this.clearForm()
        }, 1500)
        */
        console.log(this.form)

        axios.post('/lapi/team/', {
          teamName: this.form.teamName
        }).then(response => {
          console.log(response.data)
          this.userSaved = true
          this.sending = false
        }).catch(e => {
          this.errors.push(e)
          debugger
        })
      },
      validateTeam () {
        this.$v.$touch()

        if (!this.$v.$invalid) {
          this.saveUser()
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  .md-layout-item {
    margin-top: 8px;
    margin-bottom: 8px;
  }
  .md-progress-bar {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
  }
</style>
