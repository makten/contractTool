/**
*
*	Load dependences
*
*/

require('./bootstrap');



/*
*
* New up components
*
*/

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('skin-setting', require('./components/layout/SkinSetting.vue'));

import App from './components/Example.vue';
import SkinSetting from './components/layout/SkinSetting.vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);




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


const routes = [
	
	{ path: '/', component: App, name: "applicationBase" },
	{ path: '/', component: SkinSetting, name: "applicationBase" },
];


const router = new VueRouter({

	mode: 'history',

	routes

});



new Vue({

	router

}).$mount("#app");