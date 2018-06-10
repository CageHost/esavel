<template>
  <div class="md-layout md-gutter">
    <div class="md-layout-item">
      <h2>Update Profile {{user.name}}</h2>
      <div class="md-layout md-gutter">
        <div class="md-layout-item md-medium-size-33 md-xsmall-size-100">
          <md-avatar class="md-avatar-icon md-large md-accent">
            <md-icon>favorite</md-icon>
          </md-avatar>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import UserProfileComponent from '../components/UserProfileComponent';

  export default {
    components:{
      UserProfileComponent: UserProfileComponent
    },
    data() {
      return {
        user: {
          name: 'Intruder'
        }
      }
    },
    mounted() {
      // TODO: Pass from AppContainer, or use VueX!
      axios.get('/lapi/user').then(response => {
        this.user = response.data
      }).catch(e => {
        // this.errors.push(e)
        console.log('error')
      })
    }
  }
</script>
