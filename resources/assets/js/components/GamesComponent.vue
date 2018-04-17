<template>
    <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <a href="#" class="btn btn-lg btn-danger btn-block">Add Game</a>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="row">
              <div v-for="game in games" class="card col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <a :href="'/games/'+ game.alias">
                        <img class="card-img-top" :src="game.background" alt="logo">
                      </a>
                    </div>
                    <div class="panel-body">
                      <h4 class="card-title">
                        <a :href="'/games/'+ game.alias">{{game.name}}</a>
                      </h4>
                      <p>
                        Competitive, Free Play
                      </p>
                      <hr>
                      <a href="#" class="btn btn-sm btn-primary"><span class="badge">2</span> Teams</a>
                      <a href="#" class="btn btn-sm btn-success"><span class="badge">2</span> Events</a>
                      <a href="#" class="btn btn-sm btn-danger"><span class="badge">100</span> Players</a>
                    </div>
                  </div>
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
