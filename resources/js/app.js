/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// boostrap vue package
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
// ---------------------

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('stats-month', require('./components/statistiques/stats-month.vue').default);
Vue.component('text-form', require('./components/textForm.vue').default);
Vue.component('stats-year', require('./components/statistiques/stats-year.vue').default);
Vue.component('stats-product', require('./components/statistiques/stats-product.vue').default);
Vue.component('stats-origin', require('./components/statistiques/stats-origin.vue').default);
Vue.component('stats-best-product', require('./components/statistiques/stats-best-product.vue').default);
Vue.component('stats-keys-figures', require('./components/statistiques/keys-figures/stats-keys-figures.vue').default);
Vue.component('list-command', require('./components/list-commandes/list-command.vue').default);
Vue.component('stock-card', require('./components/stocks/stock-card.vue').default);
Vue.component('fabric-card', require('./components/fabrics/fabric-card.vue').default);
Vue.component('product-card', require('./components/products/product-card.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
