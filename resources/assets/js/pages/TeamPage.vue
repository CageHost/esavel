<template>
  <div>
    <h1>{{team.name}}</h1>
    <img class="card-img-top" :src="team.background" alt="Background">
  </div>
</template>

<script>
  export default {
    data() {
      return {
        team: {}
      }
    },
    mounted() {
      axios.get('/lapi/team/' + this.$route.params.alias).then(response => {
        console.log(response.data)
        this.team = response.data
      }).catch(e => {
        this.errors.push(e)
        debugger
      })
    }
  }
</script>
