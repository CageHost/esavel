<template>
    <div class="container profile">
        <div class="row">
            <div class="col-md-4 col-xs-6">
            <img class="card-img-top" :src="game.avatar" alt="logo">
          </div>
          <div class="col-md-8 col-xs-6">
            <h1 class="title-name">{{game.name}}</h1>
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
          game: []
        }
      },
      mounted() {
        axios.get('/lapi/games/' + this.$props.alias).then(response => {
          this.game = response.data
          console.log(this.game)
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>
