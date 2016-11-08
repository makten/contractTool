<script>

	import FormHelper from '../../../mixins/FormHelper';
	import VSelect from '../../../mixins/Selector.vue';
	import ClientValidationRules from '../../../mixins/validationRules';

	
	export default {

		mixins: [ FormHelper, ClientValidationRules ],

		components: { VSelect },

		props: {
			contractId: {
				type: Number,
				default: null,
				required: true
			},
		},

		data () {

			return {

				validations: [],

				klantChoice: [
				{id: 1, text: 'Bestaand'},
				{id: 2, text: 'Nieuw'}
				],

				klantgegevensForm: {

					section_name:'klantgegevens',

					contractId: '',
					mOpdrachtgever: '',	
					klant_type: 0,	
					klant_naam: '',
					klantKvK: '',
					versklant_type: 0,
					naam_partij: '',
					versklant_opdrgever: 0,
					opdrachtgever: '',
					kvk_opdrachtgever: '',
					versfactuur_partij: 0,
					factuur_partij: '',					

					errors: [],
				},
			}
		},

		mounted () {
			this.$nextTick( function () {
				

				if(this.contractId != null)
				{
					// Get data for editing
					this.editSection(`api/getSection/${this.contractId}`);					
				}
			})
		},


		
		methods: {


			storeKlantgegevens () {	

				let validationData = this.klantgegevensRules();				

				let validation = this.validateForm(this.klantgegevensForm, validationData.rules, validationData.messages);


				// if(validation.fails()){
				// 	this.validations = [];
				// 	this.validations.push(validation.errors.errors);
				// }

				// if (validation.passes()){

				// 	this.validations = [];

					//Set contractId	
					this.klantgegevensForm.contractId = this.contractId;

					this.persistForm('post', 'api/storeSection', this.klantgegevensForm);
				// }

			},

			

			/**
			 * Set edit data
			 */
			 setData (data) {

			 	if(data.klantgegevens != null){

			 		this.klantgegevensForm.section_name = data.klantgegevens.section_name;
			 		this.klantgegevensForm.contractId = data.klantgegevens.contractId;
			 		this.klantgegevensForm.mOpdrachtgever = data.klantgegevens.mOpdrachtgever;
			 		this.klantgegevensForm.klant_type = data.klantgegevens.klant_type;
			 		this.klantgegevensForm.klant_naam = data.klantgegevens.klant_naam;
			 		this.klantgegevensForm.klant_KvK = data.klantgegevens.klantKvK;
			 		this.klantgegevensForm.versklant_type = data.klantgegevens.versklant_type;
			 		this.klantgegevensForm.naam_partij = data.klantgegevens.naam_partij;
			 		this.klantgegevensForm.versklant_opdrgever = data.klantgegevens.versklant_opdrgever;
			 		this.klantgegevensForm.opdrachtgever = data.klantgegevens.opdrachtgever;
			 		this.klantgegevensForm.kvk_Opdrachtgever = data.klantgegevens.kvk_Opdrachtgever;
			 		this.klantgegevensForm.versfactuur_partij = data.klantgegevens.versfactuur_partij;
			 		this.klantgegevensForm.factuur_partij = data.klantgegevens.factuur_partij;
			 	}


			 }		

			},


			computed: {

				nieuwBestand: function () {

					if (this.klantgegevensForm.mOpdrachtgever === 'ja' && this.klantgegevensForm.klant_type == 2) {						

						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'ja' && this.klantgegevensForm.klant_type == 1) 
					{
						return 1;
					}


				},


				nieuwBestandPartije: function () {	

					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklant_type == 2) {
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklant_type == 1) 
					{
						return 1;
					}

				},



				nieuwBestandOpdrgever: function () {


					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklant_opdrgever == 2) {
						
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklant_opdrgever == 1) 
					{						
						return 1;
					}

				},



				nieuwBestandFactuurPartij: function () {


					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versfactuur_partij == 2) {
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versfactuur_partij == 1) 
					{
						return 1;
					}

				}
			}


		}

	</script>


	<template>


		<div class="klantgegevens-wrapper">	


			<!-- Form Errors -->

			<div class="alert alert-danger" v-if="klantgegevensForm.errors.length > 0">
				<p><strong>Whoops!</strong> Something went wrong!</p>
				<br>
				<ul>
					<li v-for="error in klantgegevensForm.errors">
						{{ error }}
					</li>
				</ul>
			</div>	

			<!-- Create Algemeen Form -->

			<form class="form-horizontal"  @submit.prevent="store" novalidate>



				<div class="form-group">

					<label class="col-md-4 control-label" style="margin-top: 0px;">

						Is de partij waar Unica het werk uitvoert gelijk aan de opdrachtgever en de partij waarnaar Unica de factuur stuurt? *

					</label>

					<div class="col-md-5">

						<div class="radio radio-inline radio-primary">
							<label>
								<input id="" type="radio" value="ja" name="mOpdrachtgever" v-model="klantgegevensForm.mOpdrachtgever" >
								Ja
							</label>
						</div>

						<div class="radio radio-inline radio-default">
							<label>
								<input id="" type="radio" value="nee" name="mOpdrachtgever" v-model="klantgegevensForm.mOpdrachtgever">
								Nee
							</label>						
						</div>
						<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].mOpdrachtgever }} </p>

					</div>
				</div>



				<!-- Een partije -->

				<transition
				name="custom-classes-transition"
				enter-active-class="animated zoomIn"
				leave-active-class="animated zoomOutLeft"
				>				

				<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.mOpdrachtgever === 'ja'" :class="[klantgegevensForm.mOpdrachtgever === 'ja' ? 'subquestion' : '' ]">

					<div class="form-group">

						<label for="klant_type" class="col-md-4 control-label select-label">
							Bij welke partij voert Unica het werk uit? *
						</label>

						<div class="col-md-5">						

							<v-select :options="klantChoice" v-model="klantgegevensForm.klant_type">
								<option disabled value="0">Maak keuze</option>									
							</v-select>

							<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klant_type }} </p>


						</div>

					</div>

				</div>	

			</transition>



			<div v-show="nieuwBestand === 2" :class="[klantgegevensForm.mOpdrachtgever === 'ja' ? 'subquestion' : '' ]">

				<div class="form-group">

					<label for="klant_naam" class="col-md-4 control-label">Voer klantnaam op *</label>

					<div class="col-md-5">

						<input id="algemeen-contract-klant_naam" type="text" class="form-control" name="klant_naam" v-model="klantgegevensForm.klant_naam">				
						<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klant_naam }} </p>
					</div>
				</div>

				<div class="form-group">

					<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

					<div class="col-md-5">
						<input id="klantgegevens-klantKvK" type="text" class="form-control" name="klantKvK" v-model="klantgegevensForm.klantKvK">

						<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klantKvK }} </p>
					</div>
				</div>

			</div>


			<div class="form-group" v-show="nieuwBestand == 1" :class="[klantgegevensForm.mOpdrachtgever === 'ja' ? 'subquestion' : '' ]">

				<label for="klant_naam" class="col-md-4 control-label">Zoek een klant op *</label>

				<div class="col-md-5">

					<input id="algemeen-contract-klant_naam" type="text" class="form-control" name="klant_naam" v-model="klantgegevensForm.klant_naam">

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klant_naam }} </p>				

				</div>

			</div>

			<!-- // Een partije -->


			<!-- Different parties Partij-->

			<transition
			name="custom-classes-transition"
			enter-active-class="animated zoomIn"
			leave-active-class="animated zoomOutLeft"
			>				

			<div class="form-group" style="padding: 8px;" v-show="klantgegevensForm.mOpdrachtgever === 'nee'" :class="[klantgegevensForm.mOpdrachtgever === 'nee' ? 'subquestion' : '' ]">

				<!-- <div class="form-group"> -->

				<label for="versklant_type" class="col-md-4 control-label select-label">
					Bij welke partij voert Unica het werk uit? *
				</label>

				<div class="col-md-5">


					<v-select :options="klantChoice" v-model="klantgegevensForm.versklant_type">
						<option disabled value="0">Maak keuze</option>									
					</v-select>

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versklant_type }} </p>

				</div>

				<!-- </div> -->

			</div>		


		</transition>




		<div class="form-group" v-show="nieuwBestandPartije == 2">

			<label for="naamPartij" class="col-md-4 control-label">Voer klantnaam op *</label>

			<div class="col-md-5">

				<input id="klantgegevens-naam_partij" type="text" class="form-control" name="naam_partij" v-model="klantgegevensForm.naam_partij">	

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].naam_partij }} </p>			

			</div>			

		</div>


		<div class="form-group" v-show="nieuwBestandPartije == 1">

			<label for="naam_partij" class="col-md-4 control-label">Zoek een klant op *</label>

			<div class="col-md-5">

				<input id="klantgegevens-naam_partij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naam_partij">	

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].naam_partij }} </p>				

			</div>

		</div>

		<!-- // Different parties Partij-->



		<!-- Different parties Opdrachtgever -->

		<transition
		name="custom-classes-transition"
		enter-active-class="animated zoomIn"
		leave-active-class="animated zoomOutLeft"
		>				

		<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.mOpdrachtgever === 'nee'" :class="[klantgegevensForm.mOpdrachtgever === 'nee' ? 'subquestion' : '' ]">

			<div class="form-group">

				<label for="versklant_opdrgever" class="col-md-4 control-label select-label">
					Wie is de opdrachtgever? *
				</label>

				<div class="col-md-5">				

					<v-select :options="klantChoice" v-model="klantgegevensForm.versklant_opdrgever">
						<option disabled value="0">Maak keuze</option>									
					</v-select>

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versklant_opdrgever }} </p>	
				</div>

			</div>

		</div>		


	</transition>




	<div v-show="nieuwBestandOpdrgever=== 2" >

		<div class="form-group">

			<label for="opdrachtgever" class="col-md-4 control-label">Voer naam opdrachtgever op *</label>

			<div class="col-md-5">

				<input id="klantgegevens-opdrachtgever" type="text" class="form-control" name="opdrachtgever" v-model="klantgegevensForm.opdrachtgever">

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].opdrachtgever }} </p>					

			</div>	

		</div>	

		<div class="form-group">	

			<label for="klantgegevens-kvk_opdrachtgever" class="col-md-4 control-label">Voer KvK op *</label>

			<div class="col-md-5">
				<input id="klantgegevens-kvk_opdrachtgever" type="text" class="form-control" name="kvk_opdrachtgever" v-model="klantgegevensForm.kvk_opdrachtgever">
				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].kvk_opdrachtgever }} </p>	
			</div>	

		</div>

	</div>


	<div class="form-group" v-show="nieuwBestandOpdrgever == 1" >

		<label for="opdrachtgever" class="col-md-4 control-label">Zoek een opdrachtgever op *</label>

		<div class="col-md-5">

			<input id="klantgegevens-opdrachtgever" type="text" class="form-control" name="opdrachtgever" v-model="klantgegevensForm.opdrachtgever">

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].opdrachtgever }} </p>					

		</div>

	</div>

	<!-- // Different parties opdractgever-->


	<!-- Different parties factuurpartij -->

	<transition
	name="custom-classes-transition"
	enter-active-class="animated zoomIn"
	leave-active-class="animated zoomOutLeft"
	>				

	<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.mOpdrachtgever === 'nee'" :class="[klantgegevensForm.mOpdrachtgever === 'nee' ? 'subquestion' : '' ]">

		<div class="form-group">

			<label for="versfactuur_partij" class="col-md-4 control-label select-label">
				Naar welke partij stuurt Unica de factuur? *
			</label>

			<div class="col-md-5">

				<v-select :options="klantChoice" v-model="klantgegevensForm.versfactuur_partij">
					<option disabled value="0">Maak keuze</option>									
				</v-select>

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versfactuur_partij }} </p>	


			</div>

		</div>

	</div>		


</transition>




<div class="form-group" v-show="nieuwBestandFactuurPartij == 2">

	<label for="factuur_partij" class="col-md-4 control-label">Voer naam op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-factuur_partij" type="text" class="form-control" name="factuur_partij" v-model="klantgegevensForm.factuur_partij">		

		<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].factuur_partij }} </p>			

	</div>	


</div>


<div class="form-group" v-show="nieuwBestandFactuurPartij == 1" >

	<label for="factuur_partij" class="col-md-4 control-label">Zoek de debiteur op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-factuur_partij" type="text" class="form-control" name="factuur_partij" v-model="klantgegevensForm.factuur_partij">				
		<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].factuur_partij }} </p>	
	</div>

</div>

<!-- // Different parties factuurpartij-->



<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		<!-- <button type="button" class="btn btn-info btn-raised btn-xs pull-left">Cancel</button> -->
		<button type="submit" class="btn btn-info btn-raised btn-sm pull-right" @click.prevent="storeKlantgegevens">Submit</button>
	</div>
</div>

</form>


</div>

</template>


<style>
	
	
</style>