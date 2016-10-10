
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('skin-setting', require('./components/layout/SkinSetting.vue'));



// Vue.transition('pageTransition', {
//     enterClass: 'slideInRight',
//     leaveClass: 'slideOutRight'
// });

// Vue.transition('toggle', {
//     enterClass: 'fadeIn',
//     leaveClass: 'bounceOut'
// });

// Vue.transition('swipe', {
//     enterClass: 'bounceInDown',
//     leaveClass: 'zoomOutUp'
// });

// Vue.transition('speed', {
//     enterClass: 'lightSpeedIn',
//     leaveClass: 'lightSpeedOut'
// });


new Vue({

	el: '#app',

})