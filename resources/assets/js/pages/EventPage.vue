<template>
  <div>
    <md-avatar>
      <img class="card-img-top" :src="event.avatar" alt="Avatar">
    </md-avatar>
    <h1>{{event.name}}</h1>
    <img class="card-img-top" :src="event.background" alt="Background">
  </div>
</template>

<script>
  export default {
    data() {
      return {
        event: {}
      }
    },
    mounted() {
      axios.get('/lapi/event/' + this.$route.params.alias).then(response => {
        console.log(response.data)
        this.event = response.data
      }).catch(e => {
        this.errors.push(e)
        debugger
      })
    }
  }
</script>
