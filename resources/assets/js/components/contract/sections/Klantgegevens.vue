<script>

	import VSelect from '../../../mixins/Selector.vue';

	
	export default {

		components: { VSelect },


		data () {

			return {

				klantChoice: [
				{id: 1, text: 'Bestaand'},
				{id: 2, text: 'Nieuw'}
				],

				klantgegevensForm: {

					klant_en_opdrachtgever: '',	
					klantType: 0,
					klantNaam: '',
					klantKvK: '',
					versklantType: 0,
					naamPartij: '',
					versklantOpdrgever: 0,
					opdrachtgever: '',
					versfactuurPartij: 0,
					factuurpartij: '',


					errors: [],
				},
			}
		},




		methods: {
			
			storeKlantgegevens () {

				// if (! this.klantgegevensForm.completed)
				// {
					eventBroadcaster.$emit('klantgegevens-completed', { section: 'klantgegevens', completed: true});
					// this.klantgegevensForm.completed = true;
				// }
				
			},


			evalFields (fieldName) {

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.fieldName == 2) {
					

					return 2;
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.fieldName == 1) 
				{					

					return 1;
				}
			}	

		},


		computed: {

			nieuwBestand: function () {

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.klantType == 2) {

					this.klantgegevensForm.klantNaam = '';

					return 2;
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.klantType == 1) 
				{

					this.klantgegevensForm.klantNaam = '';
					this.klantgegevensForm.klantKvK = '';

					return 1;
				}
				

			},


			nieuwBestandPartije: function () {	
				
				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantType == 2) {
					return 2;
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantType == 1) 
				{
					return 1;
				}

			},



			nieuwBestandOpdrgever: function () {
				

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever == 2) {

					this.klantgegevensForm.opdrachtgever = '';

					return 2;
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever == 1) 
				{
					this.klantgegevensForm.opdrachtgever = '';
					this.klantgegevensForm.kvkOpdrachtgever = '';

					return 1;
				}

			},



			nieuwBestandFactuurPartij: function () {
				
				
				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij == 2) {
					return 2;
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij == 1) 
				{
					return 1;
				}

			}
		}


	}

</script>

<template>

	
	<div class="algemeen-wrapper">	

		{{ klantgegevensForm }}

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
							<input id="" type="radio" value="ja" name="klant_en_opdrachtgever" v-model="klantgegevensForm.klant_en_opdrachtgever" >
							Ja
						</label>
					</div>

					<div class="radio radio-inline radio-default">
						<label>
							<input id="" type="radio" value="nee" name="klant_en_opdrachtgever" v-model="klantgegevensForm.klant_en_opdrachtgever">
							Nee
						</label>						
					</div>
					
				</div>
			</div>



			<!-- Een partije -->

			<transition
			name="custom-classes-transition"
			enter-active-class="animated zoomIn"
			leave-active-class="animated zoomOutLeft"
			>				

			<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.klant_en_opdrachtgever === 'ja'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'ja' ? 'subquestion' : '' ]">

				<div class="form-group">

					<label for="inputEmail" class="col-md-4 control-label select-label">
						Bij welke partij voert Unica het werk uit? *
					</label>

					<div class="col-md-5">
						

						<v-select :options="klantChoice" v-model="klantgegevensForm.klantType">
							<option disabled value="0">Maak keuze</option>									
						</v-select>

						

					</div>

				</div>

			</div>		


		</transition>
		

		
		<div v-show="nieuwBestand === 2" :class="[klantgegevensForm.klant_en_opdrachtgever === 'ja' ? 'subquestion' : '' ]">

			<div class="form-group">

				<label for="klantNaam" class="col-md-4 control-label">Voer klantnaam op *</label>

				<div class="col-md-5">

					<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.klantNaam">				

				</div>
			</div>

			<div class="form-group">

				<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

				<div class="col-md-5">
					<input id="klantgegevens-klantKvK" type="text" class="form-control" name="klantKvK" v-model="klantgegevensForm.klantKvK">
				</div>
			</div>

		</div>


		<div class="form-group" v-show="nieuwBestand == 1" :class="[klantgegevensForm.klant_en_opdrachtgever === 'ja' ? 'subquestion' : '' ]">

			<label for="klantNaam" class="col-md-4 control-label">Zoek een klant op *</label>

			<div class="col-md-5">

				<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.klantNaam">				

			</div>

		</div>

		<!-- // Een partije -->





		<!-- Different parties Partij-->

		<transition
		name="custom-classes-transition"
		enter-active-class="animated zoomIn"
		leave-active-class="animated zoomOutLeft"
		>				

		<div class="form-group" style="padding: 8px;" v-show="klantgegevensForm.klant_en_opdrachtgever === 'nee'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'nee' ? 'subquestion' : '' ]">

			<!-- <div class="form-group"> -->

			<label for="inputEmail" class="col-md-4 control-label select-label">
				Bij welke partij voert Unica het werk uit? *
			</label>

			<div class="col-md-5">


				<v-select :options="klantChoice" v-model="klantgegevensForm.versklantType">
					<option disabled value="0">Maak keuze</option>									
				</v-select>

			</div>

			<!-- </div> -->

		</div>		


	</transition>




	<div class="form-group" v-show="nieuwBestandPartije == 2">

		<label for="klantNaam" class="col-md-4 control-label">Voer klantnaam op *</label>

		<div class="col-md-5">

			<input id="klantgegevens-naamPartij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naamPartij">				

		</div>			

	</div>


	<div class="form-group" v-show="nieuwBestandPartije == 1">

		<label for="klantNaam" class="col-md-4 control-label">Zoek een klant op *</label>

		<div class="col-md-5">

			<input id="klantgegevens-naamPartij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naamPartij">				

		</div>

	</div>

	<!-- // Different parties Partij-->



	<!-- Different parties Opdrachtgever -->

	<transition
	name="custom-classes-transition"
	enter-active-class="animated zoomIn"
	leave-active-class="animated zoomOutLeft"
	>				

	<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.klant_en_opdrachtgever === 'nee'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'nee' ? 'subquestion' : '' ]">

		<div class="form-group">

			<label for="inputEmail" class="col-md-4 control-label select-label">
				Wie is de opdrachtgever? *
			</label>

			<div class="col-md-5">				

				<v-select :options="klantChoice" v-model="klantgegevensForm.versklantOpdrgever">
					<option disabled value="0">Maak keuze</option>									
				</v-select>


			</div>

		</div>

	</div>		


</transition>




<div v-show="nieuwBestandOpdrgever=== 2" >

	<div class="form-group">

		<label for="opdrachtgever" class="col-md-4 control-label">Voer naam opdrachtgever op *</label>

		<div class="col-md-5">

			<input id="klantgegevens-opdrachtgever" type="text" class="form-control" name="opdrachtgever" v-model="klantgegevensForm.opdrachtgever">				

		</div>	

	</div>	

	<div class="form-group">	

		<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

		<div class="col-md-5">
			<input id="klantgegevens-kvkOpdrachtgever" type="text" class="form-control" name="kvkOpdrachtgever" v-model="klantgegevensForm.kvkOpdrachtgever">
		</div>	

	</div>

</div>


<div class="form-group" v-show="nieuwBestandOpdrgever == 1" >

	<label for="klantNaam" class="col-md-4 control-label">Zoek een opdrachtgever op *</label>

	<div class="col-md-5">

		<input id="klantgegevens-opdrachtgever" type="text" class="form-control" name="opdrachtgever" v-model="klantgegevensForm.opdrachtgever">				

	</div>

</div>

<!-- // Different parties opdractgever-->


<!-- Different parties factuurpartij -->

<transition
name="custom-classes-transition"
enter-active-class="animated zoomIn"
leave-active-class="animated zoomOutLeft"
>				

<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.klant_en_opdrachtgever === 'nee'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'nee' ? 'subquestion' : '' ]">

	<div class="form-group">

		<label for="inputEmail" class="col-md-4 control-label select-label">
			Naar welke partij stuurt Unica de factuur? *
		</label>

		<div class="col-md-5">

			<v-select :options="klantChoice" v-model="klantgegevensForm.versfactuurPartij">
				<option disabled value="0">Maak keuze</option>									
			</v-select>

				<!-- <select id="klantgegevens-versfactuurPartij" name="versfactuurPartij" class="form-control select" v-model="klantgegevensForm.versfactuurPartij">

					<option value="nieuw">
						Nieuw
					</option>
					<option value="bestaand">
						Bestaand
					</option>

				</select> -->

			</div>

		</div>

	</div>		


</transition>




<div class="form-group" v-show="nieuwBestandFactuurPartij == 2">

	<label for="klantNaam" class="col-md-4 control-label">Voer naam op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.factuurpartij">				

	</div>	


</div>


<div class="form-group" v-show="nieuwBestandFactuurPartij == 1" >

	<label for="klantNaam" class="col-md-4 control-label">Zoek de debiteur op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.factuurpartij">				

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