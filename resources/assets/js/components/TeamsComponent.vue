<template>
    <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <a href="#" class="btn btn-lg btn-success btn-block">New Team</a>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="row">
              <div v-for="game in teams" class="card col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <a :href="'/teams/'+ game.alias">
                        <img class="card-img-top" :src="game.avatar" alt="logo">
                      </a>
                    </div>
                    <div class="panel-body">
                      <h3 class="card-title">
                        <a :href="'/teams/'+ game.alias">{{game.name}}</a>
                      </h3>
                      <p>{{game.description}}</p>
                      <hr>
                      <a :href="'/teams/'+ game.alias" class="btn btn-sm btn-primary"><span class="badge">2</span> Games</a>
                      <a :href="'/teams/'+ game.alias" class="btn btn-sm btn-success"><span class="badge">2</span> Events</a>
                      <a :href="'/teams/'+ game.alias" class="btn btn-sm btn-danger"><span class="badge">2</span> Players</a>
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
          teams: []
        }
      },
      mounted() {
        axios.get('/lapi/teams').then(response => {
          this.teams = response.data
        }).catch(e => {
          this.errors.push(e)
        })
      }
  }
</script>
