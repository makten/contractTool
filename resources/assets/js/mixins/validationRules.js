

export default {

	
	methods: {

		/**
		 * Validation rules and messages for
		 * Algemeen section
		 */

		algemeenRules () {

			
			return {

				rules:{

					contractVoorDerde: 'required',
					mannr: 'required_if:contractVoorDerde,ja',
					contractnaam: 'required|min:4',
					meervest: 'required',
					vestigingen: 'required_if:meervest,ja|min:2',
					imtech: 'required',
					imtechconnr: 'required_if:imtech,ja',
					contractType: 'required|not_in:0',
					algemeenOpmerking: 'max:250',

				},
				messages: {

					required: 'Dit is een verplicht veld',
					required_if: 'Dit is een verplicht veld',
					not_in: 'Maak een keuze',
					max: 'Te veel tekst',
					min: 'Te weinig tekens of keuzes',

				},
			}

		},

		/**
		 * Validation rules and messages for
		 * Klantgegevens
		 */

		klantgegevensRules () {	
			

			let rules_set1 = {

				mOpdrachtgever: 'required',
				klantType: 'required|not_in:0',
				klantNaam: 'required',
				klantKvK: 'required_if:klantType,2|min:4',				

			};

			let rules_set2 = {

				mOpdrachtgever: 'required',					
				versklantType: 'required|not_in:0',
				naamPartij: 'required|min:4',
				versklantOpdrgever: 'required|not_in:0',					
				opdrachtgever: 'required',
				kvkOpdrachtgever:'required_if:versklantOpdrgever,2|min:4',
				versfactuurPartij: 'required|not_in:0',
				factuurpartij: 'required',

			};

			let ruleset = this.klantgegevensForm.mOpdrachtgever == 'nee' ? rules_set2 : rules_set1;
			

			return { 

				rules: ruleset,

				messages: {
					required: 'Dit is een verplicht veld',
					required_if: 'Dit is een verplicht veld',
					not_in: 'Maak een keuze',
					max: 'Te veel tekst',
					min: 'Kies min. 2',

				}
			}

		}


	}

}





