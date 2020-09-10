/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

// Vue.component('Accordion', require('./components/Accordion.vue').default);
// import Accordion from './components/Accordion.vue';
import List from './components/List.vue';
// Vue.component('accordion', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

    

    new Vue({
      delimiters: ['{(', ')}'],
      el: '#app',
      components:{
      	List
      },


      data: {
        items: [
        {id:1, title:'Title 1', description: 'Description for Title 1.'},
        {id:2, title:'Title 2', description: 'Description for Title 2.'},
        {id:3, title:'Title 3', description: 'Description for Title 3.'},
        ],
      },
    });