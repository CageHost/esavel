<template>
  <div class="md-layout md-gutter">
    <div v-for="team in teams" class="md-layout-item md-large-size-25 md-medium-size-33 md-small-size-50  md-xsmall-size-100">
      <md-card class="md-primary" md-with-hover>
        <md-card-media-cover md-solid>
          <md-ripple>
            <router-link :to="'/team/'+team.alias" class="md-raised md-accent">
              <md-card-media md-ratio="16:9">
                <img :src="team.background" alt="Background">
              </md-card-media>
            </router-link>
          <md-card-area>
            <md-card-actions>
              <md-button class="md-icon-button">
                15 <md-icon style="font-size: 12px;">people</md-icon>
              </md-button>
              <md-button class="md-icon-button">
                3 <md-icon>videogame_asset</md-icon>
              </md-button>
              <md-button class="md-icon-button">
                5 <md-icon style="font-size: 12px;">event</md-icon>
              </md-button>
            </md-card-actions>
          </md-card-area>
          </md-ripple>
        </md-card-media-cover>
        <md-card-header>
          <router-link :to="'/team/'+team.alias" class="md-raised md-accent">
            <span class="md-title">{{team.name}}</span>
          </router-link>
        </md-card-header>
      </md-card>
    </div>
  </div>
</template>

<script>
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

<style lang="scss" scoped>
  .md-layout-item {
    margin-top: 16px;
    margin-bottom: 16px;
  }

  .md-card a {
    text-decoration: none;
  }

  .md-card .md-title {
    font-size: 140%;
    letter-spacing: 2px;
    color: #fff;
    font-weight: 300;
    text-shadow: 2px 2px 2px #000;
  }
</style>
