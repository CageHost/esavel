<template>
    <div class="container">
        <div class="row">
          <div v-for="game in teams" class="card col-md-4 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a :href="'/teams/'+ game.alias">
                    <img class="card-img-top" :src="game.avatar" alt="logo">
                  </a>
                </div>
                <div class="panel-body">
                  <h3 class="card-title text-center">
                    <a :href="'/teams/'+ game.alias">{{game.name}}</a>
                  </h3>
                  <hr>
                  <p>{{game.description}}</p>
                  <hr>
                  <a :href="'/teams/'+ game.alias" class="btn btn-success"><span class="badge">2</span> Members</a>
                  <a :href="'/teams/'+ game.alias" class="btn btn-primary"><span class="badge">2</span> Events</a>
                  <a :href="'/teams/'+ game.alias" class="btn btn-danger"><span class="badge">2</span> Games</a>
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
