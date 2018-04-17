<template>
    <div class="container profile">
        <div class="row profile-bg" :style="{'background-image': 'url(' + team.background + ')'}">
          <img class="profile-logo col-sm-3 col-xs-4" :src="team.avatar" alt="Logo">
        </div>
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <h1 class="title-name">{{team.name}}</h1>
            <p>{{team.description}}</p>
          </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
      props: ['alias'],
      data() {
        return {
          team: []
        }
      },
      mounted() {
        axios.get('/lapi/teams/' + this.$props.alias).then(response => {
          this.team = response.data
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>
