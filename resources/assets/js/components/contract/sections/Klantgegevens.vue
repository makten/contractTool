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

					sectionName:'klantgegevens',

					contractId: '',
					mOpdrachtgever: '',	
					klantType: 0,
					klantNaam: '',
					klantKvK: '',
					versklantType: 0,
					naamPartij: '',
					versklantOpdrgever: 0,
					opdrachtgever: '',
					kvkOpdrachtgever: '',
					versfactuurPartij: 0,
					factuurpartij: '',					

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


				if(validation.fails()){
					this.validations = [];
					this.validations.push(validation.errors.errors);
				}

				if (validation.passes()){

					this.validations = [];

					//Set contractId	
					this.klantgegevensForm.contractId = this.contractId;

					this.persistForm('post', 'api/storeSection', this.klantgegevensForm);
				}

			},		


			hasErrors () {

				return this.validations.length > 0 ? true : false;				
			},

			/**
			 * Set edit data
			 */
			 setData (data) {

			 	if(data.klantgegevens != null){

			 		this.klantgegevensForm.sectionName = data.klantgegevens.sectionName;
			 		this.klantgegevensForm.contractId = data.klantgegevens.contractId;
			 		this.klantgegevensForm.mOpdrachtgever = data.klantgegevens.mOpdrachtgever;
			 		this.klantgegevensForm.klantType = data.klantgegevens.klantType;
			 		this.klantgegevensForm.klantNaam = data.klantgegevens.klantNaam;
			 		this.klantgegevensForm.klantKvK = data.klantgegevens.klantKvK;
			 		this.klantgegevensForm.versklantType = data.klantgegevens.versklantType;
			 		this.klantgegevensForm.naamPartij = data.klantgegevens.naamPartij;
			 		this.klantgegevensForm.versklantOpdrgever = data.klantgegevens.versklantOpdrgever;
			 		this.klantgegevensForm.opdrachtgever = data.klantgegevens.opdrachtgever;
			 		this.klantgegevensForm.kvkOpdrachtgever = data.klantgegevens.kvkOpdrachtgever;
			 		this.klantgegevensForm.versfactuurPartij = data.klantgegevens.versfactuurPartij;
			 		this.klantgegevensForm.factuurpartij = data.klantgegevens.factuurpartij;
			 	}


			 }		

			},


			computed: {

				nieuwBestand: function () {

					if (this.klantgegevensForm.mOpdrachtgever === 'ja' && this.klantgegevensForm.klantType == 2) {						

						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'ja' && this.klantgegevensForm.klantType == 1) 
					{
						return 1;
					}


				},


				nieuwBestandPartije: function () {	

					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklantType == 2) {
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklantType == 1) 
					{
						return 1;
					}

				},



				nieuwBestandOpdrgever: function () {


					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever == 2) {
						
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever == 1) 
					{						
						return 1;
					}

				},



				nieuwBestandFactuurPartij: function () {


					if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij == 2) {
						return 2;
					}
					else if (this.klantgegevensForm.mOpdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij == 1) 
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

						<label for="inputEmail" class="col-md-4 control-label select-label">
							Bij welke partij voert Unica het werk uit? *
						</label>

						<div class="col-md-5">						

							<v-select :options="klantChoice" v-model="klantgegevensForm.klantType">
								<option disabled value="0">Maak keuze</option>									
							</v-select>

							<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klantType }} </p>


						</div>

					</div>

				</div>	

			</transition>



			<div v-show="nieuwBestand === 2" :class="[klantgegevensForm.mOpdrachtgever === 'ja' ? 'subquestion' : '' ]">

				<div class="form-group">

					<label for="klantNaam" class="col-md-4 control-label">Voer klantnaam op *</label>

					<div class="col-md-5">

						<input id="algemeen-contract-klantNaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.klantNaam">				
						<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klantNaam }} </p>
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

				<label for="klantNaam" class="col-md-4 control-label">Zoek een klant op *</label>

				<div class="col-md-5">

					<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.klantNaam">

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].klantNaam }} </p>				

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

				<label for="inputEmail" class="col-md-4 control-label select-label">
					Bij welke partij voert Unica het werk uit? *
				</label>

				<div class="col-md-5">


					<v-select :options="klantChoice" v-model="klantgegevensForm.versklantType">
						<option disabled value="0">Maak keuze</option>									
					</v-select>

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versklantType }} </p>

				</div>

				<!-- </div> -->

			</div>		


		</transition>




		<div class="form-group" v-show="nieuwBestandPartije == 2">

			<label for="naamPartij" class="col-md-4 control-label">Voer klantnaam op *</label>

			<div class="col-md-5">

				<input id="klantgegevens-naamPartij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naamPartij">	

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].naamPartij }} </p>			

			</div>			

		</div>


		<div class="form-group" v-show="nieuwBestandPartije == 1">

			<label for="naamPartij" class="col-md-4 control-label">Zoek een klant op *</label>

			<div class="col-md-5">

				<input id="klantgegevens-naamPartij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naamPartij">	

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].naamPartij }} </p>				

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

				<label for="inputEmail" class="col-md-4 control-label select-label">
					Wie is de opdrachtgever? *
				</label>

				<div class="col-md-5">				

					<v-select :options="klantChoice" v-model="klantgegevensForm.versklantOpdrgever">
						<option disabled value="0">Maak keuze</option>									
					</v-select>

					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versklantOpdrgever }} </p>	
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

			<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

			<div class="col-md-5">
				<input id="klantgegevens-kvkOpdrachtgever" type="text" class="form-control" name="kvkOpdrachtgever" v-model="klantgegevensForm.kvkOpdrachtgever">
				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].kvkOpdrachtgever }} </p>	
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

			<label for="inputEmail" class="col-md-4 control-label select-label">
				Naar welke partij stuurt Unica de factuur? *
			</label>

			<div class="col-md-5">

				<v-select :options="klantChoice" v-model="klantgegevensForm.versfactuurPartij">
					<option disabled value="0">Maak keuze</option>									
				</v-select>

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].versfactuurPartij }} </p>	


			</div>

		</div>

	</div>		


</transition>




<div class="form-group" v-show="nieuwBestandFactuurPartij == 2">

	<label for="opdrachtgever" class="col-md-4 control-label">Voer naam op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="factuurpartij" v-model="klantgegevensForm.factuurpartij">		

		<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].factuurpartij }} </p>			

	</div>	


</div>


<div class="form-group" v-show="nieuwBestandFactuurPartij == 1" >

	<label for="opdrachtgever" class="col-md-4 control-label">Zoek de debiteur op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="factuurpartij" v-model="klantgegevensForm.factuurpartij">				
		<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].factuurpartij }} </p>	
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