
window._ = require('lodash');


window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');
require('bootstrap');

require('bootstrap-material-design/dist/js/material.js');
require('bootstrap-material-design/dist/js/ripples.js');


import NProgress from 'nprogress';
// import 'nprogress/nprogress.css';


window.Vue = require('vue');

require('vue-resource');


Vue.http.interceptors.push((request, next) => {

	NProgress.start();
	next((response)=>{
		NProgress.done();
	});

	request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

	next();
});


// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });


