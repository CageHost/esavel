<template>
    <div class="container">
        <div class="row">
          <div v-for="game in games" class="card col-md-4 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a :href="'/games/'+ game.alias">
                    <img class="card-img-top" :src="game.background" alt="logo">
                  </a>
                </div>
                <div class="panel-body">
                  <h3 class="card-title text-center">
                    <a :href="'/games/'+ game.alias">{{game.name}}</a>
                  </h3>
                  <hr>
                  <p>
                    Competitive, Free Play
                  </p>
                  <hr>
                  <a href="#" class="btn btn-success"><span class="badge">2</span> Events</a>
                  <a href="#" class="btn btn-primary"><span class="badge">2</span> Teams</a>
                </div>
              </div>
          </div>
        </div>
    </div>
</template>

<script>
  import axios from 'axios'

  export default {
      data() {
        return {
          games: []
        }
      },
      mounted() {
        axios.get('/lapi/games').then(response => {
          this.games = response.data
          console.log(this.games)
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>
