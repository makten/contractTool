
<script>

	import FormHelper from '../../../mixins/FormHelper';	
	import VSelect from '../../../mixins/Selector.vue';


	export default {

		mixins: [FormHelper],

		components: {VSelect},

		data () {

			return {

				// errorCount: 0,
				// validating: false,
				validations: [],

				cities: [

				'Alkmaar', 'Amsterdam', 'Arnhem', 
				'Bodegraven', 'Eindhoven', 'Emmen', 
				'Geleen', 'Groningen', 'Hengelo', 
				'Hoevelaken', 'Oosterhout', 
				'Rotterdam', 'Venlo', 'Zwolle'

				],

				
				conType: [

				{ id: 0, text: 'Verkopen van contracten d.m.v. Sales'}, 
				{ id: 1, text: 'Project Imtech'}, 
				{ id: 2, text: 'Verdikking van de bestaande contracten'}, 
				{ id: 3, text: 'Via het grote projecten bedrijf'},
				{ id: 4, text: 'Tenders landelijk'}, 
				{ id: 5, text: 'Tenders lokaal'}

				],

				algemeenForm: {

					sectionName: 'algemeen',
					
					errors: [],
					contractVoorDerde: '',
					mannr: '',
					contractnaam: '',
					meervest: '',
					vestigingen: [],
					imtech: '',
					imtechconnr: '',
					contractType: 0,
					algemeenOpmerking: '',
					
					redirect: '',
					
				}
			}
		},


		mounted () {
			this.$nextTick( function () {				

				
			})
		},

		
		methods: {

			storeAlgemeen () {	

				let validation = this.validateForm(this.algemeenForm, this.validationRules(), this.validationMessages());


				// if(validation.fails()){
					// this.validations = [];
					// this.validations.push(validation.errors.errors);
				// }

				// if (validation.passes()){
					// this.validations = [];
					this.persistForm('post', 'api/storeSection', this.algemeenForm);
				// }

			},


			validationRules () {

				let rules = {

					contractVoorDerde: 'required',
					mannr: 'required_if:contractVoorDerde,ja',
					contractnaam: 'required|min:4',
					meervest: 'required',
					vestigingen: 'required_if:meervest,ja|min:2',
					imtech: 'required',
					imtechconnr: 'required_if:imtech,ja',
					contractType: 'required|not_in:0',
					algemeenOpmerking: 'max:250',
				}
				
				return rules;
			},


			validationMessages () {

				return {
					required: 'Dit is een verplicht veld',
					required_if: 'Dit is een verplicht veld',
					not_in: 'Maak een keuze',
					max: 'Te veel tekst',
					min: 'Te weinig tekens of keuzes',

				}
			},


			hasErrors () {

				return this.validations.length > 0 ? true : false;				
			}

		}
	}

</script>


<template>


	<div class="algemeen-wrapper">	


		<!-- Form Errors -->

		<div class="alert" v-if="algemeenForm.errors.length > 0" style="background-color: #F15959;">
			<p><strong>Whoops!</strong> Iets is mis gegaan!</p>
			<br>
			<ul>
				<li v-for="error in algemeenForm.errors">
					{{ error }}
				</li>
			</ul>
		</div>	

		<!-- {{ validations }} -->


		<!-- Create Algemeen Form -->

		
		<form class="form-horizontal" role="form" id="algemeenForm" @submit.prevent="store" novalidate>	

			<div class="form-group">

				<label class="col-md-4 control-label" style="margin-top: 0px;">
					Word dit contract ingediend voor iemand anders? *

					<i 	title="Het is mogelijk om een contract voor iemand anders in te richting ..." 
					id="basic-addon1"class="addon bottom fa fa-info-circle">
				</i>

			</label>

			<div class="col-md-5">
				<div class="radio radio-inline radio-primary">
					
					<label>
						<input id="algemeen-contract-contractVoorDerde" type="radio" value="ja" name="contractVoorDerde" v-model="algemeenForm.contractVoorDerde">
						Ja
					</label>
					
				</div>
				<div class="radio radio-inline radio-primary">

					<label>
						<input id="algemeen-contract-contractVoorDerde" type="radio" value="nee" name="contractVoorDerde" v-model="algemeenForm.contractVoorDerde">
						Nee
					</label>

				</div>

				<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contractVoorDerde }} </p>

			</div>
		</div>


		<transition
		name="custom-classes-transition"
		enter-active-class="animated zoomIn"
		leave-active-class="animated zoomOutLeft"
		>				

		<div class="form-group" style="margin-top: 0;" v-if="algemeenForm.contractVoorDerde === 'ja'" :class="[algemeenForm.contractVoorDerde === 'ja' ? 'subquestion' : '' ]">

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

		<label for="contractnaam" class="col-md-4 control-label">Wat is de naam van het contract? *</label>

		<div class="col-md-5">

			<input id="algemeen-contract-contractnaam" 
			type="text" class="form-control" 
			name="contractnaam" 
			v-model="algemeenForm.contractnaam" 			
			>

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contractnaam }} </p>
			

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
		<label for="contract-type" class="col-md-4 control-label select-label">Hoe is dit contract verworven? *:</label>

		<div class="col-md-5">

			<v-select :options="conType" v-model="algemeenForm.contractType">
				<option disabled value="0">Maak keuze</option>				
			</v-select>

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contractType }} </p>

		</div>
		
	</div>



	<div class="form-group">
		<label for="textArea" class="col-md-4 control-label">Extra opmerking:</label>

		<div class="col-md-5">


			<textarea class="form-control" rows="3" id="algemeenOpmerking" v-model="algemeenForm.algemeenOpmerking" maxlength="250"></textarea>
			<span class="help-block text-info"><i class="fa fa-info-circle"></i> Hier kunt u aanvullende opmerking achterlaten.</span>
			<span class="text-info pull-right text-xs" style="font-size: 10px; font-family: consolas;"> {{ 250 - algemeenForm.algemeenOpmerking.length }} tekens nog</span>
			

			<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].algemeenOpmerking }} </p>
		</div>
		
	</div>



<!-- 
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<div class="togglebutton">
							<label>
								<input type="checkbox" checked=""> Toggle button
							</label>
						</div>
					</div>
				</div> -->


				<!-- <div class="form-group">
					<label for="inputFile" class="col-md-2 control-label">File</label>

					<div class="col-md-10">
						<input type="text" readonly="" class="form-control" placeholder="Browse...">
						<input type="file" id="inputFile" multiple="">
					</div>
				</div>


				<div class="form-group">
					<label for="textArea" class="col-md-2 control-label">Textarea</label>

					<div class="col-md-10">
						<textarea class="form-control" rows="3" id="textArea"></textarea>
						<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-2 control-label">Radios</label>

					<div class="col-md-10">
						<div class="radio radio-primary">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
								Option one is this
							</label>
						</div>
						<div class="radio radio-primary">
							<label>
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								Option two can be something else
							</label>
						</div>
					</div>
				</div>


				<div class="form-group">
					<label for="select111" class="col-md-2 control-label">Select</label>

					<div class="col-md-10">
						<select id="select111" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>


				<div class="form-group">
					<label for="select222" class="col-md-2 control-label">Select Multiple</label>

					<div class="col-md-10">
						<select id="select222" multiple="" class="form-control">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>-->


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

		.chk-cities label {
			margin-right: 50px !important;
			display: inline;
		}

		.chk-cities label {
			display: block;
			float: left;
			padding-right: 10px;
			white-space: nowrap;
		}


		.subquestion {
			background: #F9F2DD;

		}
	</style>