<template>
  <div>
    <form novalidate class="md-layout md-gutter" @submit.prevent="validateTeam" enctype="multipart/form-data">
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

              <md-field>
                <label>Your fighting banner</label>
                <md-file @md-change="setLogo" accept="image/*" />
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
        logo: null,
      },
      headers: {
        'Content-Type': 'multipart/form-data'
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
      setLogo(fileList) {
        // Credit: @hailwood larachat slack
        this.form.logo = fileList.length > 0 ? fileList[0] : null;
      },
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
      redirectAfter () {
        this.$v.$router.push('teams')
      },
      saveUser () {
        this.sending = true

        const data = new FormData();
        data.append('teamName', this.form.teamName);
        data.append('logo', this.form.logo);

        axios.post('/lapi/team/', data).then(response => {
          console.log(response.data)
          this.userSaved = true
          this.sending = false
          //TODO: snackbar after redirect
          this.$router.push('teams')
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
