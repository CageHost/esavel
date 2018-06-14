<!-- <template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                      <h1>Router View</h1>
                      <router-view></router-view>

                      <button type="button" class="success button">Save</button>
                        I''m an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> -->

<template>
  <div class="page-container">
    <md-app md-mode="reveal">
      <md-app-toolbar class="md-primary md-dense">
          <div class="" style="flex: 1">
            <div id="logo-title" class="md-display-1">
              <router-link to="/">
                <span>eS</span>port<span>A</span>lliance
              </router-link>
            </div>
          </div>
          <div class="">
            <md-menu md-size="small" md-direction="bottom-end">
              <div class="md-small-hide">
                <router-link to="/events" tag="md-button">Events</router-link>
                <router-link to="/teams" tag="md-button">Teams</router-link>
                <router-link :to="{name:'gamesPage'}" tag="md-button">Games</router-link>
                <router-link to="/prizes" tag="md-button">Prizes</router-link>
                <md-button md-menu-trigger>awc737</md-button>
                <md-menu-content>
                  <router-link to="profile" tag="md-menu-item">
                    <md-icon>account_circle</md-icon>Profile
                  </router-link>
                  <md-menu-item href="/logout">
                    <md-icon>exit_to_app</md-icon>Logout
                  </md-menu-item>
                </md-menu-content>
              </div>
              <div class="md-medium-up-hide">
                <md-button class="md-icon-button md-raised md-accent" @click="userMenuVisible = !userMenuVisible">
                  <md-icon>person</md-icon>
                </md-button>
              <md-button class="md-icon-button md-raised md-accent" @click="menuVisible = !menuVisible">
                <md-icon>menu</md-icon>
              </md-button>
              </div>
            </md-menu>
          </div>
      </md-app-toolbar>

      <md-app-drawer class="md-primary" :md-right=true :md-active.sync="menuVisible">
      <md-toolbar class="md-transparent" md-elevation="0">
        <span class="md-title"><md-icon class="md-primary">map</md-icon> Navigation</span>
      </md-toolbar>
        <md-list>
          <md-list-item href="/events">Events</md-list-item>
          <md-list-item href="/teams">Teams</md-list-item>
          <md-list-item href="/games">Games</md-list-item>
          <md-list-item href="/prizes">Prizes</md-list-item>
        </md-list>
      </md-app-drawer>

      <md-app-drawer class="md-primary"  :md-right=true :md-active.sync="userMenuVisible">
        <md-toolbar :md-elevation="1" class="md-primary">
          <md-avatar class="md-avatar-icon md-accent">
            <md-icon>person</md-icon>
          </md-avatar>
        </md-toolbar>
        <md-list>
          <md-list-item>
            <md-icon class="md-primary">monetization_on</md-icon>
            <span class="md-list-item-text">Points</span>
          </md-list-item>
          <md-list-item>
            <md-icon>calendar_today</md-icon>
            <span class="md-list-item-text">Events</span>
          </md-list-item>
          <md-list-item>
            <md-icon>people</md-icon>
            <span class="md-list-item-text">Friends</span>
          </md-list-item>
          <md-list-item>
            <md-icon>error</md-icon>
            <span class="md-list-item-text">Messages</span>
          </md-list-item>
        </md-list>
      </md-app-drawer>

      <md-app-content id="default-page">
        <slot></slot>
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
    // height: 196px;
  }

  .md-toolbar {
    min-height: 64px;

    .md-title .md-icon {
        // margin-right: 5px;
    }
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
    menuVisible: false,
    userMenuVisible: false
  })
}
</script>
