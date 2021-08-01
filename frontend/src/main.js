import Vue from 'vue'

import VueRouter from 'vue-router'

import routes from './services/routes.js';

import Empty from './layouts/Empty/Empty.vue';

Vue.use(VueRouter);

new Vue({
  el: '#app',
  router: routes,
  render: h => h(Empty)
})
