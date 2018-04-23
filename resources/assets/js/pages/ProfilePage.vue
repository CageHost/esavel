<template>
  <div class="md-layout md-gutter">
    <div class="md-layout-item">
      <h2>Update Profile</h2>
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

      mounted() {
          console.log('Component mounted.')
      }
  }
</script>
