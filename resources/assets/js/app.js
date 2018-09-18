
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueSweetalert2 from 'vue-sweetalert2';

window.Vue = require('vue');

window.events = new Vue();

window.noty = function(notification) {
    window.events.$emit('notification', notification)
};
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueSweetalert2);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('lessons', require('./components/Lessons.vue'));
Vue.component('noty', require('./components/Noty.vue'));

const app = new Vue({
    el: '#app'
});
