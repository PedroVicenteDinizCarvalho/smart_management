
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'Vuex';
Vue.use(Vuex);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 //Vuex
 const store = new Vuex.Store({
 	state: {
 		item:{}
 	},
 	mutations:{
 		setItem(state, obj){
 			state.item = obj;
 		}
 	}
 });

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-component', require('./components/TopComponent.vue').default);
Vue.component('dashboard-component', require('./components/controlPanels/DashboardComponent.vue').default);
Vue.component('page-nav-component', require('./components/navs/Page.vue').default);
Vue.component('breadcrumb-component', require('./components/navs/Breadcrumb.vue').default);
Vue.component('minimalist-box-component', require('./components/boxes/MinimalistBoxes.vue').default);
Vue.component('table-component', require('./components/tables/HoverableRows.vue').default);
Vue.component('modal-link-component', require('./components/modals/ModalLink.vue').default);
Vue.component('modal-component', require('./components/modals/Modal.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
