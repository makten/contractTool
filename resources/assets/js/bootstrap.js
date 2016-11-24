import TurboLinks from 'turbolinks';
TurboLinks.start();

window._ = require('lodash');


window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('bootstrap');


require('arrive/src/arrive.js');
require('bootstrap-material-design/dist/js/material.js');
require('bootstrap-material-design/dist/js/ripples.js');
require('./mixins/dropdown.js');



import NProgress from 'nprogress';



window.Validator = require('validatorjs');

Validator.register('multi_required', function(value, requirement, attr){
	console.log(attr)
}, 'test');



import axios from 'axios';

window.Vue = require('vue');

// Vue.use(Axios);

// Vue.prototype.$http = axios;

require('vue-resource');


Vue.http.interceptors.push((request, next) => {
	

	request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

	next();


});


// axios.interceptors.request.use((request, next) => {
	

// 	request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

// 	next();


// });


// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });


