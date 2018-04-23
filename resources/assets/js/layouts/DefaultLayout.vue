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
    <md-app md-waterfall md-mode="flexible">
      <md-app-toolbar class="md-large md-primary">
        <div class="md-toolbar-row">
          <!-- <div class="md-toolbar-section-start">
            <md-button class="md-icon-button" @click="menuVisible = !menuVisible">
              <md-icon>menu</md-icon>
            </md-button>
          </div>-->

          <div class="md-toolbar-section-end">
            <md-menu md-size="small" md-direction="bottom-end">
              <router-link to="login" tag="md-button">Events</router-link>
              <router-link to="login" tag="md-button">Teams</router-link>
              <router-link to="login" tag="md-button">Games</router-link>
              <router-link to="login" tag="md-button">Prizes</router-link>
              <md-button md-menu-trigger>awc737</md-button>
              <md-menu-content>
                <router-link to="profile" tag="md-menu-item">
                  <md-icon>account_circle</md-icon>Profile
                </router-link>
                <router-link to="/logout" tag="md-menu-item">
                  <md-icon>exit_to_app</md-icon>Logout
                </router-link>
              </md-menu-content>
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

      <md-app-drawer :md-active.sync="menuVisible">
        <md-toolbar class="md-transparent" md-elevation="0">Navigation</md-toolbar>

        <md-list>
          <md-list-item>
            <md-icon>move_to_inbox</md-icon>
            <span class="md-list-item-text">Inbox</span>
          </md-list-item>

          <md-list-item>
            <md-icon>send</md-icon>
            <span class="md-list-item-text">Sent Mail</span>
          </md-list-item>

          <md-list-item>
            <md-icon>delete</md-icon>
            <span class="md-list-item-text">Trash</span>
          </md-list-item>

          <md-list-item>
            <md-icon>error</md-icon>
            <span class="md-list-item-text">Spam</span>
          </md-list-item>
        </md-list>
      </md-app-drawer>

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
