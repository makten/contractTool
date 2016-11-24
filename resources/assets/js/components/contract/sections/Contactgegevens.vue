<script>

	import FormHelper from '../../../mixins/FormHelper';	
	import SearchEngine from '../../../mixins/SearchEngine';	
	import VSelect from '../../../mixins/Selector.vue';
	import ClientValidationRules from '../../../mixins/validationRules';
	
	export default {

		mixins: [FormHelper, ClientValidationRules, SearchEngine],

		components: {VSelect},


		props: {
			contractId: {
				type: Number,
				default: null,
				required: true
			},
		},

		data () {

			return {

				
				searchcompanies: {},
				searchQuery: '',

				companydetailsForm: {

					errors: [],

					debnr: '',
					naam: '',
					kvk: '',
					adres: '',
					postcode: '',
					plaats: '',

				},

				companies: [
				
				],

				contactpersons: [
				
				],

				hasNullCompanyError: false,
				hasNullContactError: false,


				validations: [],				

				contactgegevensForm: {
					
					section_name: 'contactgegevens',

					id: 0,

					errors: [],
					bedrijf_particulier: '',					
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

				$('#modal-create-company').on('shown.bs.modal', () => {
					$('#create-company-name').focus();
				});

				$('#modal-edit-client').on('shown.bs.modal', () => {
					$('#edit-client-name').focus();
				});
			})
		},


		methods: {


			/**
             * Show the form for creating new company.
             */
             showcompanyForm() {
             	$('#modal-create-company').modal('show');
             },


             /**
             * Show the form for creating new contact person.
             */
             showcontactpersonForm() {
             	$('#modal-create-contactperson').modal('show');
             },


            /**
             * Edit the given client.
             */
             edit(client) {
             	this.editForm.id = client.id;
             	this.editForm.name = client.name;
             	this.editForm.redirect = client.redirect;

             	$('#modal-edit-client').modal('show');
             },


             search(){

             	let query = {search: this.searchQuery}
             	
             	this.makeSearch('api/companysearch/', query);             	
             	
             },


             storeCompany () {             	             	

             	this.persistCompanydetails('post', 'api/contractcompany/'+ this.contractId, this.companydetailsForm);

             	this.companydetailsForm.errors = '';
             	this.companydetailsForm.debnr = '';
             	this.companydetailsForm.naam = '';
             	this.companydetailsForm.kvk = '';
             	this.companydetailsForm.adres = '';
             	this.companydetailsForm.postcode = '';
             	this.companydetailsForm.plaats = '';

             },


             editCompany (company){

             	console.log(company);
             },


             /*
             * Remove a given company
             */
             removeCompany (company){             	

             	this.companies = _.reject(this.companies, (com) => {com.debnr === company.debnr});
             },


             storeContactgegevens () {


             	// let validationData = this.contactgegevensRules();

             	// let validation = this.validateForm(
	             // 		this.contactgegevensForm, 
	             // 		validationData.rules, 
	             // 		validationData.messages
             	// 	);


             	// if(validation.fails()){
             	// 	this.validations = [];
             	// 	this.validations.push(validation.errors.errors);
             	// }

             	// if (validation.passes()){
             	// 	this.validations = [];
             	// 	this.persistForm('post', 'api/storeSection', this.contactgegevensForm);
             	// }

             	this.contactgegevensRules();

             	if (!this.hasNullCompanyError && !this.hasNullContactError){
             		// this.validations = [];
             		this.persistForm('post', 'api/storeSection', this.contactgegevensForm);
             	}


             },



			/**
			 * Set edit data
			 */
			 setData (data) {

			 	if(data.klantgegevens != null){

			 		// this.klantgegevensForm.section_name = data.klantgegevens.section_name;
			 		// this.klantgegevensForm.contractId = data.klantgegevens.contractId;
			 		
			 	}


			 },

			 setCompanySearchData (data) {
			 	

			 	if(data.length > 1){
			 		
			 		this.searchcompanies = data;
			 	}
			 	else if(data.length == 1){

			 		this.setcompanyData(data[0]);
			 	}
			 },



			 setcompanyData (company) {
			 	

			 	this.companydetailsForm.debnr = company.debnr
			 	this.companydetailsForm.naam = company.naam
			 	this.companydetailsForm.kvk = company.kvk
			 	this.companydetailsForm.adres = company.adres
			 	this.companydetailsForm.postcode = company.postcode
			 	this.companydetailsForm.plaats = company.plaats

			 	this.searchcompanies = {};
			 	this.searchQuery = '';
			 }

			}

		}


	</script>

	<template>


		<div class="contactgegevens-wrapper">	

			<!-- Form Errors -->

			<div class="alert" v-if="contactgegevensForm.errors.length > 0" style="background-color: #F15959;">
				<p><strong>Whoops!</strong> Iets is mis gegaan!</p>
				<br>
				<ul>
					<li v-for="error in contactgegevensForm.errors">
						{{ error }}
					</li>
				</ul>
			</div>	


			<!-- Create Algemeen Form -->

			<fieldset>


				<form class="form-horizontal" role="form" id="contactgegevensForm" @submit.prevent="store" novalidate>	


					<div class="form-group">

						<label class="col-md-4 control-label" style="margin-top: 0px;">
							Betreft de klant een bedrijf of een particulier? *

						</label>

						<div class="col-md-5">
							<div class="radio radio-inline radio-primary"  style="padding: 1px;">

								<label style="font-size: 11px;">
									<input type="radio" value="bedrijf" name="bedrijf_particulier" v-model="contactgegevensForm.bedrijf_particulier" lazy>
									Bedrijf
								</label>

							</div>
							<div class="radio radio-inline radio-primary" style="padding: 1px;">

								<label style="font-size: 11px;">
									<input type="radio" value="particulier" name="bedrijf_particulier" v-model="contactgegevensForm.bedrijf_particulier" lazy>
									Particulier
								</label>

							</div>

							<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].bedrijf_particulier }} </p>

						</div>
					</div>





					<transition
					name="custom-classes-transition"
					enter-active-class="animated zoomIn"
					leave-active-class="animated zoomOutLeft"
					>				

					<div class="form-group" style="margin-top: 0;" >

						<div class="col-md-5">

							<a href="javascript:void(0)" 
							v-if="contactgegevensForm.bedrijf_particulier === 'bedrijf'" 
							class="btn btn-primary btn-sm"	
							@click="showcompanyForm"					
							>

							<i class="material-icons">add_circle</i> 
							bedrijf
						</a>

						<a href="javascript:void(0)" 
						class="btn btn-success btn-sm"
						@click="showcontactpersonForm"
						>
						<i class="material-icons">add_circle</i> 
						contactpersoon
					</a>

					<!-- <input type="hidden" name="hidden_companies">
					<input type="hidden" name="hidden_contacts"> -->

					<p class="error-block text-danger" v-if="hasNullCompanyError">Je hebt geen bedrijf toegevoegd</p>	

					<p class="error-block text-danger" v-if="hasNullContactError">Je hebt geen contactpersoon toegevoegd</p>						

				</div>

			</div>


		</transition>

		<div class="list-group col-md-8" v-if="companies.length > 0">

			<div class="list-group-item" v-for="company in companies">

				<div class="row-action-primary">
					<i class="material-icons" style="border-radius: 0px; font-size: 35px;">contact_phone</i>
				</div>

				<div class="row-content">

					<div class="pull-right"> 

						<span class="text-danger clickable"
						@click="removeCompany(company)"
						> 
						<i class="material-icons">clear</i> 
					</span>
				</div>
				

				<div class="pull-right" 
				
				>
				<span href="javascript:void(0)" class="text-primary clickable"
				@click="editCompany(company)"
				>
				bewerken &nbsp
			</span>
		</div>


		<h4 class="list-group-item-heading">{{ company.naam }}</h4>

		<p class="list-group-item-text">{{ company.adres }}</p>
	</div>

	<div class="list-group-separator"></div>

</div>				

</div>


<br/>


<div class="form-group">
	<div class="col-md-10 col-md-offset-2">					
		<button type="submit" class="btn btn-info btn-raised btn-sm pull-right" @click.prevent="storeContactgegevens">Submit</button>
	</div>
</div>

</fieldset>

</form>



<!-- Create Client Modal -->
<div class="modal fade" id="modal-create-company" tabindex="-1" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h4 class="modal-title">
					Bedrijf toevoegen
				</h4>
			</div>

			<div class="modal-body">

				<!-- Form Errors -->
				<div class="alert alert-danger" v-if="companydetailsForm.errors.length > 0">
					<p><strong>Whoops!</strong> Iets is mis gegaan!</p>
					<br>
					<ul>
						<li v-for="error in companydetailsForm.errors">
							{{ error }}
						</li>
					</ul>
				</div>					

				<table class="table table-striped table-hover searchtable" v-if="searchcompanies.length > 1">
					<thead>
						<tr>
							<th>Debnr</th>
							<th>Naam</th>
							<th>KvK</th>
							<th>Adres</th>
							<th>Postcode</th>
							<th>Plaats</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="company in searchcompanies" @click='setcompanyData(company)'>


							<td>
								{{ company.debnr }}
							</td>

							<td>
								{{ company.naam }}
							</td>

							<td>
								{{ company.kvk }}
							</td>

							<td>
								{{ company.adres }}
							</td>

							<td>
								{{ company.postcode }}
							</td>

							<td>
								{{ company.plaats }}
							</td>

						</tr>							

					</tbody>
				</table>



				<!-- Create Client Form Modal-->
				<fieldset>
					<form class="form-horizontal" role="form" id="companydetails_form">

						
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							
							<div class="input-group col-md-7">

								<span class="input-group-addon"><i class="material-icons">search</i></span>

								<input id="create-contactperson-searchQuery" type="search" class="form-control searchbox"
								placeholder="Zoek bedrijf op" 
								@keyup.enter="search" v-model="searchQuery">
								

							</div>
						</div>

						<!-- Debnr -->
						<div class="form-group">
							<label class="col-md-3 control-label">Debnr</label>

							<div class="col-md-7">

								<input id="create-comp-debnr" name="debnr" type="text" class="form-control"
								v-model="companydetailsForm.debnr">

							</div>
						</div>


						<div class="form-group">
							<label class="col-md-3 control-label">Naam</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="naam"
								v-model="companydetailsForm.naam">
							</div>

						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">KvK</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="kvk"
								v-model="companydetailsForm.kvk">
							</div>

						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Adres</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="adres"
								v-model="companydetailsForm.adres">
							</div>

						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Postcode</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="postcode"
								v-model="companydetailsForm.postcode">
							</div>

						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Plaats</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="plaats"
								v-model="companydetailsForm.plaats">
							</div>

						</div>


					</form>

				</fieldset>

			</div>

			<!-- Modal Actions -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				<button type="button" class="btn btn-primary" @click="storeCompany">
					Opslaan
				</button>
			</div>
		</div>
	</div>
</div>

</div>




</div>

</template>


<style>

</style>