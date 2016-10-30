
import NProgress from 'nprogress';

export default {




	methods: {

		
		persistForm (method, uri, form) {

			form.errors = [];

			NProgress.start();					


			this.$http[method](uri, form)			
			.then(response => {

				NProgress.done();


				// this.getContracts()
				// 
				
				//Empty all form fields (this.$el)
				
				form.redirect = '';

				form.errors = [];

			})
			.catch( response => {

				if (typeof response.data === 'object')
				{
					form.errors = _.flatten(_.toArray(response.data));
				}
				else {

					form.errors = ['Iets is fout gegaan. Probeer het opnieuw'];
				}

			});

		}

	}


}

