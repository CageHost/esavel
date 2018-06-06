
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import VueMaterial from 'vue-material';

Vue.use(VueRouter)
Vue.use(VueMaterial)

var Test = Vue.extend({
  template: '<h1>Test!</h1>'
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('user-profile-component', require('./components/UserProfileComponent.vue'));
Vue.component('game-component', require('./components/GameComponent.vue'));
Vue.component('games-component', require('./components/GamesComponent.vue'));
Vue.component('teams-component', require('./components/TeamsComponent.vue'));
Vue.component('team-component', require('./components/TeamComponent.vue'));
Vue.component('events-component', require('./components/EventsComponent.vue'));
// TODO: these may be irrelevant
Vue.component('event-card', require('./components/EventCard.vue'));

Vue.component('app-container', require('./AppContainer.vue'));

import AppContainer from './AppContainer.vue'
import DefaultLayout from './layouts/DefaultLayout.vue'
import GuestLayout from './layouts/GuestLayout.vue'
import WelcomePage from './pages/Welcome'
import PageNotFound from './pages/PageNotFound'
import ProfilePage from './pages/ProfilePage'
import EventsPage from './pages/EventsPage'
import EventPage from './pages/EventPage'
import TeamsPage from './pages/TeamsPage'
import TeamPage from './pages/TeamPage'
import GamesPage from './pages/GamesPage'
import GamePage from './pages/GamePage'
import LoginPage from './pages/Login'

const router = new VueRouter({
    mode: 'history',
    routes: [
      {
          path: '/welcome',
          name: 'home',
          component: WelcomePage,
      },
      { path: '/', component: GuestLayout,
        children: [
          {
              path: 'test',
              name: 'test',
              component: LoginPage,
          },
          {
              path: 'login',
              name: 'login',
              component: LoginPage,
          },
          {
              path: 'profile',
              name: 'profile',
              component: ProfilePage,
          },
          {
              path: 'events',
              name: 'events',
              component: EventsPage,
          },
          {
              path: 'teams',
              name: 'teams',
              component: TeamsPage,
          },
          {
              path: 'games',
              name: 'gamesPage',
              component: GamesPage,
          },
          // TODO: wildcard does not catch /event/*
          { path: '/event/:alias', component: EventPage },
          { path: '/game/:alias', component: GamePage },
          { path: '/team/:alias', component: TeamPage },
          { path: ':wildcard', component: PageNotFound },
        ]
      }
    ]
});

const app = new Vue({
    el: '#app',
    components: { AppContainer },
    router
});
