<template>
  <div class="page-container">
    <md-app md-waterfall md-mode="flexible">
      <md-app-toolbar class="md-large md-primary">
        <div class="md-toolbar-row">
          <div class="md-toolbar-section-end">
            <md-menu md-size="small" md-direction="bottom-end" >
              <router-link to="/events" tag="md-button">Events</router-link>
              <router-link to="/teams" tag="md-button">Teams</router-link>
              <router-link :to="{name:'gamesPage'}" tag="md-button">Games</router-link>
              <router-link to="/prizes" tag="md-button">Prizes</router-link>
              <router-link to="/login" tag="md-button">Login</router-link>
            </md-menu>
            <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
              <md-icon>menu</md-icon>
            </md-button>
          </div>
        </div>
        <div class="md-toolbar-row">
          <div id="logo-title" class="md-display-1">
            <span>eS</span>port<span>A</span>lliance</div>
        </div>
      </md-app-toolbar>
      <md-app-content id="default-page">
        <router-view></router-view>
      </md-app-content>
    </md-app>
  </div>
</template>

<style lang="scss" scoped>
  .md-app {
    max-height: 100vh;
    min-height: 100vh;
    border: 1px solid rgba(#000, .12);
  }

  .md-app-toolbar {
    height: 196px;
  }

   // Demo purposes only
  .md-drawer {
    width: 230px;
    max-width: calc(100vw - 125px);
  }

  .md-menu {
    // margin: 24px;
  }
</style>

<script>
export default {
  name: 'Flexible',
  data: () => ({
    menuVisible: false
  })
}
</script>
