import Vue from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueCountryCode from "vue-country-code-select";
import {routes} from './routes';

require('./bootstrap');
window.Vue = require('vue');
Vue.use(VueAxios, axios);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueCountryCode);

import ShoppingCart from './components/ShoppingCart.vue';

new Vue({
  render: h => h(ShoppingCart),
}).$mount('#app');