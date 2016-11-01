
import NProgress from 'nprogress';

export default {




	methods: {

		
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

