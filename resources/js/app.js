require('./bootstrap');

import Vue from 'vue'
import App from './vue/app'

import { BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/src/jquery.js';
import 'bootstrap/dist/js/bootstrap.min.js';

Vue.use(BootstrapVueIcons)

const app = new Vue({
    el: '#app',
    router,
    store,
    components: { App }
})