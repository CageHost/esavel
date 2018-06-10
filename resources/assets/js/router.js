import Vue from 'vue';
import VueRouter from 'vue-router';

import AppContainer from './AppContainer.vue'

import HomePage from './pages/HomePage'
import PageNotFound from './pages/PageNotFound'
import ProfilePage from './pages/ProfilePage'
import EventsPage from './pages/EventsPage'
import EventPage from './pages/EventPage'
import TeamsPage from './pages/TeamsPage'
import TeamPage from './pages/TeamPage'
import GamesPage from './pages/GamesPage'
import GamePage from './pages/GamePage'
import LoginPage from './pages/Login'

Vue.use(VueRouter)

const routes = [
  {
      path: '/',
      name: 'home',
      component: HomePage,
  },
  {
      path: '/events',
      name: 'events',
      component: EventsPage,
  },
  {
      path: '/teams',
      name: 'teams',
      component: TeamsPage,
  },
  {
      path: '/games',
      name: 'gamesPage',
      component: GamesPage,
  },
  {
      path: '/login',
      name: 'login',
      component: LoginPage,
  },
  {
      path: '/profile',
      name: 'profile',
      component: ProfilePage,
  },
  // TODO: wildcard does not catch /event/*
  { path: '/event/:alias', component: EventPage },
  { path: '/game/:alias', component: GamePage },
  { path: '/team/:alias', component: TeamPage },
  { path: ':wildcard', component: PageNotFound },
]

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
