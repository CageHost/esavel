<template>
    <div class="container profile">
        <div class="row">
            <div class="col-md-4 col-xs-6">
            <img class="card-img-top" :src="team.avatar" alt="logo">
          </div>
          <div class="col-md-8 col-xs-6">
            <h1 class="title-name">{{team.name}}</h1>
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
