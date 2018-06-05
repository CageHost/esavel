<template>
  <div>
    <h1>{{game.name}}</h1>
    <img class="card-img-top" :src="game.background" alt="Background">
  </div>
</template>

<script>
  export default {
    data() {
      return {
        game: {}
      }
    },
    mounted() {
      axios.get('/lapi/game/' + this.$route.params.alias).then(response => {
        console.log(response.data)
        this.game = response.data
      }).catch(e => {
        this.errors.push(e)
        debugger
      })
    }
  }
</script>
