/**
 * import Vue from "vue"
 * import Example from "./Example.vue"
 */

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const token = document.querySelector('meta[name="csrf-token"]')
if (token) {
  window.axios.defaults.headers.common['X-Csrf-Token'] = token.getAttribute('content')
}

/**
 * Loader Example React component
 */
require('./Example.jsx')

/*
 * Vue.component('example', Example)
 * 
 * new Vue({
 *   el: "#main"
 * })
 */
