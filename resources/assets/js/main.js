import Vue from 'vue';
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');
import resource from 'vue-resource';
import VueRouter from 'vue-router';
Vue.use(resource);
Vue.use(VueRouter);
var App = Vue.extend();
var router = new VueRouter();
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
//Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="website_id"]').attr('content');

import Login from './components/Login.vue';
import Register from './components/Register.vue';
import CreateWebsite from './components/CreateWebsite.vue';
import UserMenu from './components/UserMenu.vue';

Vue.component('login', Login);
Vue.component('register', Register);
Vue.component('create-website', CreateWebsite);
Vue.component('user-menu', UserMenu);

var vm = new Vue({
    el: 'body',
    events: {
        'loggedIn': function(data) {
            this.$broadcast('loggedIn', data);
        }
    }
});