/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { InertiaApp } from '@inertiajs/inertia-vue'
import Vue from 'vue'

Vue.prototype.$route = (...args) => route(...args).url()
Vue.use(InertiaApp)

Vue.component('pagination', require('laravel-vue-pagination'));
/* import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate) */

const app = document.getElementById('app')

if (app) {
    new Vue({
        render: h => h(InertiaApp, {
            props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
            },
        }),
    }).$mount(app)
}


