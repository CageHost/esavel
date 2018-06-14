<template>
  <div class="md-layout md-gutter">
    <div v-for="game in games" class="md-layout-item md-large-size-25 md-medium-size-33 md-small-size-50  md-xsmall-size-100">
      <md-card class="md-primary" md-with-hover>
        <md-card-media-cover md-text-scrim>
          <md-ripple>
            <router-link :to="'/game/'+game.alias" class="md-raised md-accent">
              <md-card-media md-ratio="16:9">
                <img :src="game.background" alt="Background">
              </md-card-media>
            </router-link>

          <md-card-area>
            <md-card-actions>
              <md-button class="md-icon-button md-accent">
                37 <md-icon color="red">favorite</md-icon>
              </md-button>
              <md-button class="md-icon-button">
                5 <md-icon>calendar_today</md-icon>
              </md-button>
              <md-button class="md-icon-button">
                15 <md-icon style="font-size: 12px;">people</md-icon>
              </md-button>
            </md-card-actions>
          </md-card-area>
          </md-ripple>
        </md-card-media-cover>
        <md-card-header>
          <router-link :to="'/game/'+game.alias" class="md-raised md-accent">
            <span class="md-title">{{game.name}}</span>
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
      games: []
    }
  },
  mounted() {
    axios.get('/lapi/games').then(response => {
      this.games = response.data
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
    font-size: 130%;
    letter-spacing: 2px;
    color: #fff;
    font-weight: 300;
    text-shadow: 2px 2px 2px #000;
  }
</style>
