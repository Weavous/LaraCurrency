import Vue from 'vue'
import Template from './pages/Template.vue'

import VueRouter from 'vue-router'

import routes from './services/domain/routes.js';

Vue.use(VueRouter);

new Vue({
  el: '#app',
  router: routes,
  render: h => h(Template)
})
