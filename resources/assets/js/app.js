
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueMaterial from 'vue-material';

Vue.use(VueMaterial)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* TODO: these may be irrelevant
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('user-profile-component', require('./components/UserProfileComponent.vue'));
Vue.component('game-component', require('./components/GameComponent.vue'));
Vue.component('games-component', require('./components/GamesComponent.vue'));
Vue.component('teams-component', require('./components/TeamsComponent.vue'));
Vue.component('team-component', require('./components/TeamComponent.vue'));
Vue.component('events-component', require('./components/EventsComponent.vue'));
Vue.component('event-card', require('./components/EventCard.vue'));
*/

Vue.component('app-container', require('./AppContainer.vue'));

import AppContainer from './AppContainer.vue'

import router from './router.js'

// window.whichLayout = GuestLayout;

const app = new Vue({
    el: '#app',
    router,
});
