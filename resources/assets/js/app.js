
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('notifications', require('./components/notifications.vue'));

const app = new Vue({
    el: '#app'
 });

//  var userId = '{!! \Auth::id() !!}';
//  console.log("user id :", userId);
//
// Echo.private('App.User.'+ userId)
//     .notification((notification) => {
//     console.log(notification);
// });
