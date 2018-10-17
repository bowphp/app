import Vue from 'vue';
import JQuery from "jquery"

/**
 * Import JQuery
 */
window.JQuery = window.$ = JQuery;

/**
 * Loader example vue components
 */
Vue.component('code', require('../components/ExampleComponent.vue'));

/**
 * Mount component
 */
new Vue({
    el: "#root"
});
