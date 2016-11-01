
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


		/**
		 * Save form section
		 */
		
		persistForm (method, uri, form) {

			form.errors = [];

			NProgress.start();


			this.$http[method](uri, form)			
			.then(response => {
				

				NProgress.done();

				
				if ( ! form.completed)
				{
					eventBroadcaster.$emit(`${form.sectionName}-completed`, { section: form.sectionName, completed: true, form: form });
					this.form.completed = true;
				}
				
				form.redirect = '';

				form.errors = [];

			})
			.catch( response => {

				NProgress.done();
				
				eventBroadcaster.$emit(`${form.sectionName}-completed`, { section: form.sectionName, completed: true, form: form });
				
				
				if (typeof response.data === 'object')
				{
					
					form.errors = _.flatten(_.toArray(response.data));
				}
				else {

					form.errors = ['Iets is mis gegaan. Probeer het opnieuw'];
				}

			});

		}
		

	}


}

