import Vue from 'vue';

Vue.component('example', require('../components/ExampleComponent.vue'));
Vue.component('shell', require('../components/ShellComponent.vue'));

new Vue({
    el: "#main"
});
