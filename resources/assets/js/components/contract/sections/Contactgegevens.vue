<script>
	
	export default {


		props: [],

		data () {

			return {

				contactgegevensForm: {
					
					section_name: 'algemeen',

					id: 0,

					errors: [],
					contract_voorderde: '',
					mannr: '',
					contract_naam: '',
					meervest: '',
					vestigingen: [],
					imtech: '',
					imtechconnr: '',
					contract_type: 0,
					algemeen_opmerking: '',
					
					redirect: '',
					
				},
			}
		},


		methods: {
			
			storeAlgemeen () {

				// if (! this.algemeenForm.completed)
				// {
					eventBroadcaster.$emit('contactgegevens-completed', { section: 'contactgegevens', completed: true});
					// this.algemeenForm.completed = true;
				// }
				
			}
		}


	}

</script>

<template>

	
	<div class="contactgegevens-wrapper">	

		<!-- Form Errors -->

		<div class="alert" v-if="algemeenForm.errors.length > 0" style="background-color: #F15959;">
			<p><strong>Whoops!</strong> Iets is mis gegaan!</p>
			<br>
			<ul>
				<li v-for="error in contactgegevensForm.errors">
					{{ error }}
				</li>
			</ul>
		</div>	


		<!-- Create Algemeen Form -->

		
		<form class="form-horizontal" role="form" id="algemeenForm" @submit.prevent="store" novalidate>	

			<input type="hidden" name="id" ref="conId">

			<div class="form-group">

				<label class="col-md-4 control-label" style="margin-top: 0px;">
					Betreft de klant een bedrijf of een particulier? *

					<i 	title="Het is mogelijk om een contract voor iemand anders in te richting ..." 
					id="basic-addon1"class="addon bottom fa fa-info-circle">
				</i>

			</label>

			<div class="col-md-5">
				<div class="radio radio-inline radio-primary">
					
					<label>
						<input id="algemeen-contract-contract_voorderde" type="radio" value="ja" name="contract_voorderde" v-model="algemeenForm.contract_voorderde" lazy>
						Ja
					</label>
					
				</div>
				<div class="radio radio-inline radio-primary">

					<label>
						<input id="algemeen-contract-contract_voorderde" type="radio" value="nee" name="contract_voorderde" v-model="algemeenForm.contract_voorderde" lazy>
						Nee
					</label>

				</div>

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contract_voorderde }} </p>

			</div>
		</div>


		<transition
		name="custom-classes-transition"
		enter-active-class="animated zoomIn"
		leave-active-class="animated zoomOutLeft"
		>				

		<div class="form-group" style="margin-top: 0;" v-if="algemeenForm.contract_voorderde === 'ja'" :class="[algemeenForm.contract_voorderde === 'ja' ? 'subquestion' : '' ]">

			<label for="mannr" class="col-md-4 control-label">
				Voor wie word dit contract ingevoerd? <b><sup>(optioneel)</sup></b>
			</label>

			<div class="col-md-5" v-if="">


				<input id="algemeen-contract-mannr" 
				type="text" class="form-control " 
				name="mannr" 
				v-model="algemeenForm.mannr"
				
				>					
				<!-- <p class="error-block text-danger" v-if="validation.length > 0">{{ validation.errors.first('mannr') }} </p> -->
				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].mannr }} </p>
				

				<p class="help-block text-info"><i class="fa fa-info-circle"></i> Als je een contract inricht voor een derde</p>
			</div>

		</div>

	</transition>



	<div class="form-group">

		<label for="contract_naam" class="col-md-4 control-label">Wat is de naam van het contract? *</label>

		<div class="col-md-5">

			<input id="algemeen-contract-contract_naam" 
			type="text" class="form-control" 
			name="contractnaam" 
			v-model="algemeenForm.contract_naam" 
			lazy			
			>

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contract_naam }} </p>
			

		</div>

	</div>


	<div class="form-group">

		<label class="col-md-4 control-label" style="margin-top: 0px;">
			Zijn er meerdere vestigingen financieel verantwoordelijk voor dit contract? *

						<!-- <i title="" id="basic-addon1"class="addon bottom fa fa-info-circle">
					</i> -->

				</label>

				<div class="col-md-5">
					<div class="radio radio-inline radio-primary">
						<label>
							<input id="algemeen-contract-meervestja" type="radio" value="ja" name="meervest" v-model="algemeenForm.meervest">
							Ja
						</label>
					</div>
					<div class="radio radio-inline radio-primary">
						<label>
							<input id="algemeen-contract-meervestnee" type="radio" value="nee" name="meervest" v-model="algemeenForm.meervest">
							Nee
						</label>
					</div>
					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].meervest }} </p>
				</div>
			</div>


			<transition
			name="custom-classes-transition"
			enter-active-class="animated zoomIn"
			leave-active-class="animated zoomOutLeft"
			>				

			<div class="form-group" style="margin-top: 0;" v-show="algemeenForm.meervest === 'ja'" :class="[algemeenForm.meervest === 'ja' ? 'subquestion' : '' ]">


				<label class="col-md-4 control-label" style="margin-top: 0px;">
					Welke vestigingen? *
				</label>

				<div class="col-md-5">

					<div class="checkbox chk-cities" v-for="city in cities">

						<label>

							<input type="checkbox" :value="city" v-model="algemeenForm.vestigingen" > {{ city }}							

						</label>

					</div>
					<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].vestigingen }} </p>
				</div>

			</div>

		</transition>



		<div class="form-group">

			<label class="col-md-4 control-label" style="margin-top: 0px;">
				Betreft dit een voormalig Imtech contract? *

			</label>

			<div class="col-md-8">
				<div class="radio radio-inline radio-primary">
					<label>
						<input id="algemeen-contract-imteccontract" type="radio" value="ja" name="imtech" v-model="algemeenForm.imtech">
						Ja
					</label>
				</div>
				<div class="radio radio-inline radio-primary">
					<label>
						<input id="algemeen-contract-imteccontract" type="radio" value="nee" name="imtech" v-model="algemeenForm.imtech">
						Nee
					</label>
				</div>
				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].imtech }} </p>
			</div>
		</div>


		<transition
		name="custom-classes-transition"
		enter-active-class="animated zoomIn"
		leave-active-class="animated zoomOutLeft"
		>	

		<div class="form-group" v-show="algemeenForm.imtech === 'ja'" :class="[algemeenForm.imtech === 'ja' ? 'subquestion' : '' ]">

			<label for="imtec-connr" class="col-md-4 control-label">
				Contractnummer Imtech (SC nr.) *:
			</label>

			<div class="col-md-5">

				<input type="text" class="form-control" id="imtec-connr" name="imtechconnr" v-model="algemeenForm.imtechconnr">

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].imtechconnr }} </p>
			</div>
			

		</div>

	</transition>


	<p><b>Verworven contract</b></p>

	<div class="form-group">
		<label for="contract_type" class="col-md-4 control-label select-label">Hoe is dit contract verworven? *:</label>

		<div class="col-md-5">

			<v-select :options="conType" v-model="algemeenForm.contract_type">
				<option disabled value="0">Maak keuze</option>				
			</v-select>

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contract_type }} </p>

		</div>
		
	</div>



	<div class="form-group">
		<label for="algemeen_opmerking" class="col-md-4 control-label">Extra opmerking:</label>

		<div class="col-md-5">


			<textarea class="form-control" rows="3" id="algemeen_opmerking" v-model="algemeenForm.algemeen_opmerking" maxlength="250"></textarea>
			<span class="help-block text-info"><i class="fa fa-info-circle"></i> Hier kunt u aanvullende opmerking achterlaten.</span>
			<span class="text-info pull-right text-xs" style="font-size: 10px; font-family: consolas;"> {{ 250 - algemeenForm.algemeen_opmerking.length }} tekens nog</span>
			

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].algemeen_opmerking }} </p>
		</div>
		
	</div>




	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">
			<!-- <button type="button" class="btn btn-default btn-raised btn-xs pull-left">Cancel</button> -->
			<button type="submit" class="btn btn-info btn-raised btn-sm pull-right" @click.prevent="storeAlgemeen">Submit</button>
		</div>
	</div>


	<!-- </fieldset> -->
</form>	


</div>

</template>


<style>


</style>