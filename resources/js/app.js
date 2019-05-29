/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue')
window.axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('feed', require('./components/feed.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



import Vue from 'vue'
import Feed from './components/feed.vue'
import Favorite from './components/fav.vue'

/* eslint-disable */
Vue.config.productionTip = false



const feed = new Vue({
    props:['propMessage'],
    el:'#feed',

    mounted(){
        console.dir(this.propMessage)

    },
    // render: h => h(Feed),

})

new Vue({

    render:h => h(Favorite),

}).$mount ('#fav')

