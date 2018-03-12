import Vue from 'vue'
import router from './router'

require('bootstrap-sass')

const app = new Vue({
  router,
  el: '#app',
  render: h => h(require('./app.vue')),
})
