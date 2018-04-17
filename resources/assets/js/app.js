
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
Vue.component('event-component', require('./components/EventComponent.vue'));

import DefaultLayout from './layouts/DefaultLayout.vue'
import ProfilePage from './pages/ProfilePage'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/test',
            name: 'test',
            component: Test,
        },
        {
            path: '/profile',
            name: 'profile',
            component: ProfilePage,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { DefaultLayout },
    router
});
