<script>
	
	export default {


		data () {

			return {

				klantgegevensForm: {

					klant_en_opdrachtgever: '',	
					klantType: '',
					klantNaam: '',
					klantKvK: '',
					versklantType: '',
					naamPartij: '',
					versklantOpdrgever: '',
					opdrachtgever: '',
					versfactuurPartij: '',
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

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.fieldName === 'nieuw') {
					return 'nieuw';
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.fieldName === 'bestaand') 
				{
					return 'bestaand';
				}
			}	

		},


		computed: {

			nieuwBestand: function () {

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.klantType === 'nieuw') {
					return 'nieuw';
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'ja' && this.klantgegevensForm.klantType === 'bestaand') 
				{
					return 'bestaand';
				}
				

			},


			nieuwBestandPartije: function () {	
				
				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantType === 'nieuw') {
					return 'nieuw';
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantType === 'bestaand') 
				{
					return 'bestaand';
				}

			},



			nieuwBestandOpdrgever: function () {
				

				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever === 'nieuw') {
					return 'nieuw';
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versklantOpdrgever === 'bestaand') 
				{
					return 'bestaand';
				}

			},



			nieuwBestandFactuurPartij: function () {
				
				
				if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij === 'nieuw') {
					return 'nieuw';
				}
				else if (this.klantgegevensForm.klant_en_opdrachtgever === 'nee' && this.klantgegevensForm.versfactuurPartij === 'bestaand') 
				{
					return 'bestaand';
				}

			}
		}


	}

</script>

<template>

	
	<div class="algemeen-wrapper">	

		<!-- {{ klantgegevensForm }} -->

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

					<label for="inputEmail" class="col-md-4 control-label">
						Bij welke partij voert Unica het werk uit? *
					</label>

					<div class="col-md-5">

						<select id="contract-type" name="klantType" class="form-control select" v-model="klantgegevensForm.klantType">

							<option value="nieuw">
								Nieuw
							</option>
							<option value="bestaand">
								Bestaand
							</option>

						</select>

					</div>

				</div>

			</div>		


		</transition>
		

		
		<div class="form-group" v-show="nieuwBestand === 'nieuw'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'ja' ? 'subquestion' : '' ]">

			<label for="klantNaam" class="col-md-4 control-label">Voer klantnaam op *</label>

			<div class="col-md-5">

				<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.klantNaam">				

			</div>

			<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

			<div class="col-md-5">
				<input id="klantgegevens-klantKvK" type="text" class="form-control" name="klantKvK" v-model="klantgegevensForm.klantKvK">
			</div>

		</div>


		<div class="form-group" v-show="nieuwBestand === 'bestaand'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'ja' ? 'subquestion' : '' ]">

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

		<div class="form-group" style="margin-top: 0;" v-show="klantgegevensForm.klant_en_opdrachtgever === 'nee'" :class="[klantgegevensForm.klant_en_opdrachtgever === 'nee' ? 'subquestion' : '' ]">

			<div class="form-group">

				<label for="inputEmail" class="col-md-4 control-label">
					Bij welke partij voert Unica het werk uit? *
				</label>

				<div class="col-md-5">

					<select id="contract-verstype" name="versklantType" class="form-control select" v-model="klantgegevensForm.versklantType">

						<option value="nieuw">
							Nieuw
						</option>
						<option value="bestaand">
							Bestaand
						</option>

					</select>

				</div>

			</div>

		</div>		


	</transition>




	<div class="form-group" v-show="nieuwBestandPartije === 'nieuw'">

		<label for="klantNaam" class="col-md-4 control-label">Voer klantnaam op *</label>

		<div class="col-md-5">

			<input id="klantgegevens-naamPartij" type="text" class="form-control" name="naamPartij" v-model="klantgegevensForm.naamPartij">				

		</div>			

	</div>


	<div class="form-group" v-show="nieuwBestandPartije === 'bestaand'">

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

			<label for="inputEmail" class="col-md-4 control-label">
				Wie is de opdrachtgever? *
			</label>

			<div class="col-md-5">

				<select id="contract-verstype" name="versklantOpdrgever" class="form-control select" v-model="klantgegevensForm.versklantOpdrgever">

					<option value="nieuw">
						Nieuw
					</option>
					<option value="bestaand">
						Bestaand
					</option>

				</select>

			</div>

		</div>

	</div>		


</transition>




<div class="form-group" v-show="nieuwBestandOpdrgever=== 'nieuw'" >

	<label for="opdrachtgever" class="col-md-4 control-label">Voer naam opdrachtgever op *</label>

	<div class="col-md-5">

		<input id="klantgegevens-opdrachtgever" type="text" class="form-control" name="opdrachtgever" v-model="klantgegevensForm.opdrachtgever">				

	</div>		

	<label for="klantgegevens-klantKvK" class="col-md-4 control-label">Voer KvK op *</label>

	<div class="col-md-5">
		<input id="klantgegevens-kvkOpdrachtgever" type="text" class="form-control" name="kvkOpdrachtgever" v-model="klantgegevensForm.kvkOpdrachtgever">
	</div>	

</div>


<div class="form-group" v-show="nieuwBestandOpdrgever === 'bestaand'" >

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

		<label for="inputEmail" class="col-md-4 control-label">
			Naar welke partij stuurt Unica de factuur? *
		</label>

		<div class="col-md-5">

			<select id="klantgegevens-versfactuurPartij" name="versfactuurPartij" class="form-control select" v-model="klantgegevensForm.versfactuurPartij">

				<option value="nieuw">
					Nieuw
				</option>
				<option value="bestaand">
					Bestaand
				</option>

			</select>

		</div>

	</div>

</div>		


</transition>




<div class="form-group" v-show="nieuwBestandFactuurPartij === 'nieuw'">

	<label for="klantNaam" class="col-md-4 control-label">Voer naam op *</label>

	<div class="col-md-5">

		<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="klantNaam" v-model="klantgegevensForm.factuurpartij">				

	</div>	


</div>


<div class="form-group" v-show="nieuwBestandFactuurPartij === 'bestaand'" >

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