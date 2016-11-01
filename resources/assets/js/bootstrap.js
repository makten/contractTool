
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



window.Vue = require('vue');

require('vue-resource');


Vue.http.interceptors.push((request, next) => {
	

	request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

	next();


});


// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });


