import Vue from 'vue';
import resource from 'vue-resource';
import VueRouter from 'vue-router';
Vue.use(resource);
Vue.use(VueRouter);
var App = Vue.extend();
var router = new VueRouter();
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="website_id"]').attr('content');

import Login from './components/Login.vue';
import Register from './components/Register.vue';
import CreateWebsite from './components/CreateWebsite.vue';

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('create-website', CreateWebsite);

var vm = new Vue({
    el: '#app'
});