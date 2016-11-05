


export default {


	
	mounted () {

		this.$nextTick(function(){


		})
	},


	methods: {


		/**
		 * Form validator		
		 */

		 makeSearch(query, responseBag){

		 	this.$http.get(url).then((response) => {

		 		console.log(response.data);

		 		responseBag = response.data;
		 	})

		 },

		  // This is where the debounce actually belongs.
		  expensiveOperation: _.debounce(function () {
		  	this.isCalculating = true
		  	setTimeout(function () {
		  		this.isCalculating = false
		  		this.searchQueryIsDirty = false
		  	}.bind(this), 1000)
		  }, 500)



		}


	}

