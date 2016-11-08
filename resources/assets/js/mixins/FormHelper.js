
import NProgress from 'nprogress';


export default {


	mounted () {

		this.$nextTick(function(){


		})
	},


	methods: {


		/**
		 * Form validator		
		 */

		 validateForm (form, rules, msg){

		 	return new Validator(form, rules, msg);
		 },
		 

		 hasErrors () {

				return this.validations.length > 0 ? true : false;				
			},


		/**
		 * Save form section
		 */

		 persistForm (method, uri, form) {

		 	form.errors = [];

		 	NProgress.start();


		 	this.$http[method](uri, form)			
		 	.then(response => {								

		 		NProgress.done();

		 		

		 		let databag = { section: form.section_name, completed: true, form: form, contractId: response.data.id };

		 		eventBroadcaster.$emit(`${form.section_name}-completed`, databag );
		 		

		 		form.redirect = '';

		 		form.errors = [];

		 	})
		 	.catch( response => {

		 		NProgress.done();

		 		eventBroadcaster.$emit(`${form.section_name}-completed`, { section: form.section_name, completed: true, form: form });


		 		if (typeof response.data === 'object')
		 		{

		 			form.errors = _.flatten(_.toArray(response.data));
		 		}
		 		else {

		 			form.errors = ['Iets is mis gegaan. Probeer het opnieuw'];
		 		}

		 	});

		 },


		 /**
		  * Get section data and pass for edit
		  */

		  editSection (url){


		  	this.$http.get(url)
		  	.then((response) => {					

		  		this.setData(response.data);
		  	});	 	

		  },

		}


	}

