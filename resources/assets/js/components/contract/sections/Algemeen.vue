
<script>
	
	export default {

		data () {

			return {

				cities: ['Alkmaar', 'Amsterdam', 'Arnhem', 'Bodegraven', 'Eindhoven', 'Emmen', 'Geleen', 'Groningen', 'Hengelo', 'Hoevelaken', 'Oosterhout', 'Rotterdam', 'Venlo', 'Zwolle'],

				contractType: ['Verkopen van contracten d.m.v. Sales', 'Project Imtech', 'Verdikking van de bestaande contracten', 'Via het grote projecten bedrijf', 'Tenders landelijk', 'Tenders lokaal',
				],



				algemeenForm: {
					mannr: '',
					contractnaam: '',
					meervest: '',
					vestigingen: ['Amsterdam'],
					imtech: '',
					imtechconnr: '',
					contractType: '',

					completed: false,
					errors: [],
				}
			}
		},



		methods: {

			checkChecked(city) {

				return true;
			},


			storeAlgemeen () {

				if (! this.algemeenForm.completed)
				{
					eventBroadcaster.$emit('algemeen-completed', { text: 'over-to-klant'});

					this.algemeenForm.completed = true;
				}



				
			}
		}
	}

</script>


<template>


	<div class="algemeen-wrapper">	

		

			<form class="form-horizontal" role="form" @submit.prevent="store" novalidate>

				<!-- <fieldset> -->

					<legend>Algemeen</legend>

					{{ algemeenForm }}

					<!-- Form Errors -->

					<div class="alert alert-danger" v-if="algemeenForm.errors.length > 0">
						<p><strong>Whoops!</strong> Something went wrong!</p>
						<br>
						<ul>
							<li v-for="error in algemeenForm.errors">
								{{ error }}
							</li>
						</ul>
					</div>


					<!-- Create Algemeen Form -->


					<div class="form-group">

						<label for="inputEmail" class="col-md-4 control-label">
							Voor wie word dit contract ingevoerd? <b><sup>(optioneel)</sup></b>
						</label>

						<div class="col-md-5">


						<input id="algemeen-contract-mannr" type="text" class="form-control" name="mannr" v-model="algemeenForm.mannr" >	
											

							<p class="help-block text-info"><i class="fa fa-info-circle"></i> Als je een contract inricht voor een derde</p>
						</div>

					</div>

					<div class="form-group">

						<label for="inputPassword" class="col-md-4 control-label">Wat is de naam van het contract? *</label>

						<div class="col-md-5">

							<input id="algemeen-contract-contractnaam" type="text" class="form-control" name="mannr" v-model="algemeenForm.contractnaam">

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

			<div class="col-md-8">

				<input type="text" class="form-control" id="imtec-connr" name="imtechconnr" v-model="algemeenForm.imtechconnr">

			</div>

		</div>

	</transition>


	<p><b>Verworven contract</b></p>

	<div class="form-group">
		<label for="contract-type" class="col-md-4 control-label">Hoe is dit contract verworven? *:</label>

		<div class="col-md-5">

			<select id="contract-type" name="contractType" class="form-control select" v-model="algemeenForm.contractType">

				<option v-for="contype in contractType" :value="contype">
					{{ contype }}
				</option>

			</select>

		</div>
	</div>


	<div class="form-group">
		<label for="textArea" class="col-md-4 control-label">Extra opmerking:</label>

		<div class="col-md-5">
			<textarea class="form-control" rows="3" id="algemeenOpmerking" v-model="algemeenForm.algemeenOpmerking"></textarea>
			<span class="help-block text-info"><i class="fa fa-info-circle"></i> Hier kunt u aanvullende opmerking achterlaten.</span>
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
						<button type="button" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary" @click.prevent="storeAlgemeen">Submit</button>
					</div>
				</div>


				<!-- </fieldset> -->
			</form>
	</validator>

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