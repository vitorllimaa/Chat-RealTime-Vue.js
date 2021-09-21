/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import store from './store/store'

Vue.component('chat', () => import('./components/chat/chat'))
Vue.component('user', () => import('./components/chat/user'))
Vue.component('Message', () => import('./components/chat/message'))


const app = new Vue({
    store,
    el: '#app',
});
