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

Vue.component('dashboard', require('./components/layout/Dashboard.vue'));
Vue.component('sidebar', require('./components/layout/Sidebar.vue'));
Vue.component('create-contract', require('./components/contract/CreateContract.vue'));
// Vue.component('landing', require('./components/layout/Landing.vue'));
Vue.component('skin-setting', require('./components/layout/SkinSetting.vue'));

// import App from './components/Example.vue';

// import SkinSetting from './components/layout/SkinSetting.vue';
// import VueRouter from 'vue-router';

// Vue.use(VueRouter);




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


// const routes = [

// 	{ path: '/test', component: App}
// 	// { path: '/', component: SkinSetting, name: "applicationBase" },
// ];


// const router = new VueRouter({

// 	mode: 'history',

// 	routes

// });



// new Vue({

// 	router

// }).$mount("#app");

window.eventBroadcaster = new Vue();




const app = new Vue({



	el: "#app",

	mounted () {
		this.$nextTick( function(){

			$.material.init();
			$.material.ripples();
			$.material.input();
			$.material.checkbox();				
			
			// 
			// //Tooltip popups
			$(".top").tooltip({
				placement: "top"
			});
			$(".right").tooltip({
				placement: "right"
			});
			$(".bottom").tooltip({
				placement: "bottom"
			});
			$(".left").tooltip({
				placement: "left"
			});


		})
	}

})