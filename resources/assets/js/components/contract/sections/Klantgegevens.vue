<script>
	
	export default {


		data () {

			return {

				klantgegevensForm: {

					klant_en_opdrachtgever: '',


					errors: [],

				},
			}
		},




		methods: {
			
			klantgegevensForm () {

				// if (! this.klantgegevensForm.completed)
				// {
					eventBroadcaster.$emit('klantgegevens-completed', { section: 'klantgegevens', completed: true});
					// this.klantgegevensForm.completed = true;
				// }
				
			}
		}


	}

</script>

<template>

	
	<div class="algemeen-wrapper">	

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

		<form class="form-horizontal" role="form" @submit.prevent="store" novalidate>


			<div class="form-group">

				<label for="inputEmail" class="col-md-4 control-label">
					Voor wie word dit contract ingevoerd? <b><sup>(optioneel)</sup></b>
				</label>

				<div class="col-md-5">


					<input id="algemeen-contract-mannr" type="text" class="form-control" name="mannr" v-model="klantgegevensForm.mannr" >	
					

					<p class="help-block text-info"><i class="fa fa-info-circle"></i> Als je een contract inricht voor een derde</p>
				</div>

			</div>

			<div class="form-group">

				<label for="inputPassword" class="col-md-4 control-label">Wat is de naam van het contract? *</label>

				<div class="col-md-5">

					<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="mannr" v-model="klantgegevensForm.contractnaam">

				</div>

			</div>


			<div class="form-group">

				<label class="col-md-4 control-label">

					Is de partij waar Unica het werk uitvoert gelijk aan de opdrachtgever en de partij waarnaar Unica de factuur stuurt? *

				</label>

				<div class="col-md-5">
					<div class="radio radio-inline radio-primary">
						<label>
							<input id="klant_en_opdrachtgeverja" type="radio" value="ja" name="" v-model="klantgegevensForm.klant_en_opdrachtgever">
							Ja
						</label>
					</div>
					<div class="radio radio-inline radio-primary">
						<label>
							<input id="klant_en_opdrachtgevernee" type="radio" value="nee" name="" v-model="klantgegevensForm.klant_en_opdrachtgever">
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

						<select id="contract-type" name="contractType" class="form-control select" v-model="klantgegevensForm.contractType">

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
		


		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				<button type="button" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-primary" @click.prevent="klantgegevensForm">Submit</button>
			</div>
		</div>

	</form>


</div>

</template>


<style>
	
	
</style>