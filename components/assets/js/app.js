import Vue from 'vue';

Vue.components('exemple', require('../components/ExempleComponent.vue'));
Vue.components('shell', require('../components/ShellComponent.vue'));

new Vue({
    el: "#root"
});
