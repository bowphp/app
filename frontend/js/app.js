import jQuery from "jquery"
/**
 * // Loader Example Vue component
 * import Vue from "vue"
 * import Example from "./Example.vue"
 * 
 * Vue.component('example', Example);
 * 
 * new Vue({
 *   el: "#main"
 * });
 */

/**
 * Import JQuery
 */
window.jQuery = window.$ = jQuery;

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

/**
 * Loader Example React component
 */
require('./Example.jsx');
