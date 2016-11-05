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

				
				contactpersons: [],

				searchQuery: '',

				companies: [

				{ name: 'Ziggo', contact_person: {}, address: 'Ziggostraat 12 8292FD Amsterdam' },
				{ name: 'Kpn', contact_person: {}, address: 'Kpnstraat 12 8292FD Amsterdam' },
				{ name: 'Vodafone', contact_person: {}, address: 'Vodafonestraat 12 8292FD Amsterdam' },
				],


				validations: [],


				contactgegevensForm: {

				},

				contactgegevensForm: {
					
					section_name: 'contactgegevens',

					id: 0,

					errors: [],
					contact_type: '',
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

		mounted () {
			this.$nextTick( function () {				

				if(this.contractId != null)
				{
					// Get data for editing
					this.editSection(`api/getSection/${this.contractId}`);					
				}

				$('#modal-create-contactperson').on('shown.bs.modal', () => {
					$('#create-contactperson-name').focus();
				});

				$('#modal-edit-client').on('shown.bs.modal', () => {
					$('#edit-client-name').focus();
				});
			})
		},


		methods: {


			/**
             * Show the form for creating new clients.
             */
             showcontactgegevensForm() {
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

             	this.makeSearch('api/searchperson/'+this.searchQuery, this.contactpersons);
             },


             store(){

             },


             storeAlgemeen () {

				// if (! this.contactgegevensForm.completed)
				// {
					eventBroadcaster.$emit('contactgegevens-completed', { section: 'contactgegevens', completed: true});
					// this.contactgegevensForm.completed = true;
				// }
				
			},

			hasErrors () {

				return this.validations.length > 0 ? true : false;				
			},


			/**
			 * Set edit data
			 */
			 setData (data) {

			 	if(data.klantgegevens != null){

			 		// this.klantgegevensForm.section_name = data.klantgegevens.section_name;
			 		// this.klantgegevensForm.contractId = data.klantgegevens.contractId;
			 		
			 	}


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


			<form class="form-horizontal" role="form" id="contactgegevensForm" @submit.prevent="store" novalidate>	

				<input type="hidden" name="id" ref="conId">

				<div class="form-group">

					<label class="col-md-4 control-label" style="margin-top: 0px;">
						Betreft de klant een bedrijf of een particulier? *

					</label>

					<div class="col-md-5">
						<div class="radio radio-inline radio-primary">

							<label>
								<input type="radio" value="bedrijf" name="contact_type" v-model="contactgegevensForm.contact_type" lazy>
								Bedrijf
							</label>

						</div>
						<div class="radio radio-inline radio-primary">

							<label>
								<input type="radio" value="particulier" name="contact_type" v-model="contactgegevensForm.contact_type" lazy>
								Particulier
							</label>

						</div>

						<p class="error-block text-danger" v-if="hasErrors()"> {{ validations[0].contact_type }} </p>

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
						v-if="contactgegevensForm.contact_type === 'bedrijf'" 
						class="btn btn-primary btn-sm"						
						>

						<i class="material-icons">add_circle</i> 
						bedrijf
					</a>

					<a href="javascript:void(0)" 
					class="btn btn-success btn-sm"
					@click="showcontactgegevensForm"
					>
					<i class="material-icons">add_circle</i> 
					contactpersoon
				</a>						

			</div>

		</div>


	</transition>

	<div class="list-group col-md-7" v-if="companies.length > 0">

		<div class="list-group-item" v-for="company in companies">

			<div class="row-action-primary">
				<i class="material-icons" style="border-radius: 0px; font-size: 35px;">contact_phone</i>
			</div>

			<div class="row-content">

				<div class="pull-right"> <span style="color: #FB390C; font-size: 7px;"> <i class="material-icons">clear</i> </span></div>
				<div class="pull-right"> <span style="color: #2F85F0;"> bewerken &nbsp</span></div>


				<h4 class="list-group-item-heading">{{ company.name }}</h4>

				<p class="list-group-item-text">{{ company.address }}</p>
			</div>

			<div class="list-group-separator"></div>

		</div>				

	</div>


	<div class="form-group">
		<div class="col-md-10 col-md-offset-2">					
			<button type="submit" class="btn btn-info btn-raised btn-sm pull-right" @click.prevent="storeAlgemeen">Submit</button>
		</div>
	</div>



	<!-- Create Client Modal -->
	<div class="modal fade" id="modal-create-contactperson" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title">
						Contactpersoon toevoegen
					</h4>
				</div>

				<div class="modal-body">
					<!-- Form Errors -->
					<div class="alert alert-danger" v-if="contactgegevensForm.errors.length > 0">
						<p><strong>Whoops!</strong> Iets is mis gegaan!</p>
						<br>
						<ul>
							<li v-for="error in contactgegevensForm.errors">
								{{ error }}
							</li>
						</ul>
					</div>				


					<table class="table table-striped table-hover" v-if="contactpersons.length > 0">
						<thead>
							<tr>
								<th>Mannr</th>
								<th>Initialen</th>
								<th>Column heading</th>
								<th>Column heading</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="contactperson in contactpersons">

								<td>
									{{ contactperson.mpers_persnr }}
								</td>

								<td>
									{{ contactperson.mpers_initialen }}
								</td>

								<td>
									{{ contactperson.mpers_achternaam }}
								</td>

								<td>
									{{ contactperson.mpers_email }}
								</td>

								<td>
									{{ contactperson.mpers_functie }}
								</td>

							</tr>							

						</tbody>
					</table>



					<!-- Create Client Form -->
					<form class="form-horizontal" role="form">

						<div class="form-group">
							<label class="col-md-3 control-label">Zoek</label>

							<div class="col-md-7">

								<input id="create-contactperson-searchQuery" type="text" class="form-control"
								@keyup.enter="search" v-model="searchQuery">

							</div>
						</div>

						<!-- Name -->
						<div class="form-group">
							<label class="col-md-3 control-label">Name</label>

							<div class="col-md-7">
								<input id="create-contactperson-name" type="text" class="form-control"
								@keyup.enter="store" v-model="contactgegevensForm.name">								

								<span class="help-block">
									Something your users will recognize and trust.
								</span>
							</div>
						</div>

						<!-- Redirect URL -->
						<div class="form-group">
							<label class="col-md-3 control-label">Redirect URL</label>

							<div class="col-md-7">
								<input type="text" class="form-control" name="redirect"
								@keyup.enter="store" v-model="contactgegevensForm.redirect">

								<span class="help-block">
									Your application's authorization callback URL.
								</span>
							</div>
						</div>
					</form>
				</div>

				<!-- Modal Actions -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					<button type="button" class="btn btn-primary" @click="store">
						Create
					</button>
				</div>
			</div>
		</div>
	</div>



</form>	


</div>

</template>


<style>

</style>