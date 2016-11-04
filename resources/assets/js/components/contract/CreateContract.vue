<script>


	import { 	

		Algemeen, Klantgegevens, 
		Contactgegevens, Contractvorm, 
		Operationeel, Financieel, 
		InstallatieOnderhoud, Uitvoerlocatie, 
		Verstuur
	} from './sections/index';



	export default {

		components: {

			Algemeen, 
			Klantgegevens, 
			Contactgegevens, 
			Contractvorm, 
			Operationeel, 
			Financieel, 
			InstallatieOnderhoud, 
			Uitvoerlocatie, 
			Verstuur

		},


		data () {

			return {

				contractId: '',
				algemeen: true,
				completed: 0,
				algemeenForm: '',

				sectionPreview: [
				{sec: 'algemeen', data: ''},
				{sec: 'klantgegevens', data: ''},
				{sec: 'contactgegevens', data: ''}					
				],						
				

				formSections: [
				{section: 'algemeen', completed: false, active: true},
				{section: 'klantgegevens', completed: false, active: false},
				{section: 'contactgegevens', completed: false, active: false},
				{section: 'contractvorm', completed: false, active: false},
				{section: 'optioneel', completed: false, active: false},
				{section: 'financieel', completed: false, active: false},
				{section: 'installatie-onderhoud', completed: false, active: false},
				{section: 'verstuur', completed: false, active: false},

				],
			}
		},



		created () {

			eventBroadcaster.$on('algemeen-completed', this.incrementCompleted);			
			eventBroadcaster.$on('klantgegevens-completed', this.incrementCompleted);			
			eventBroadcaster.$on('contactgegevens-completed', this.incrementCompleted);			
			eventBroadcaster.$on('contractvorm-completed', this.incrementCompleted);			

		},


		methods: {

			/**
			 * Recieve completed form from event
			 */

			 incrementCompleted (form) {


				// Set Contract ID
				if(form.section === 'algemeen'){

					this.contractId = form.contractId;
				}				


				let vm = this;	

				this.setPreview(form);
				

				this.formSections = _.map( this.formSections, function(fm){
					

					if(fm.section == form.section)
					{
						//Increment completion percentage
						if(!fm.completed){
							vm.completed += (100 / vm.formSections.length);
						}


						fm.completed = true;
						fm.active = false;

						let next = _.indexOf(vm.formSections, fm) + 1;

						vm.formSections[next].active = true;
					}

					return fm;

				} );


			},

			changeView (section){

				this.formSections = _.map( this.formSections, function(fm){

					fm.active = false;

					if(fm.completed)
					{														
						fm.active = true
					}

					if(!fm.active && fm.section === 'algemeen'){fm.active = true}

					return fm;

				} );

			},


			setPreview (section) {	

				this.sectionPreview = _.map(this.sectionPreview, (sec) => {
					

					if(sec.sec === section.section)
					{
						sec.data = section.form;
					}

					return sec;
				})

				

			},


			checkActive (sections) {

				_.each(sections, function(sec) {
					if (sec.active){
						return sec.active;
					}
				})

			},
			

		},

		computed: {

			// isActive: function (sent) {

			// 	_.each(this.sectionPreview, (prev) => {


			// 	});				
			// }

		}

	}

</script>

<template>

	<div class="main">


		<div class="contract-wrapper col-md-9" style="margin:0; padding: 0;">


			<div class="widget">

				<div class="title">Nieuwe contract</div>

				<div class="contentwrapper" style="margin:0; padding: 0;">



					<!-- Progress bar -->
					<div class="progress progress-striped">
						<div class="progress-bar progress-bar-success" :style="{ width: completed + '%' }">
							<span class="sr-only"> {{ completed }} % compleet </span>
						</div>
					</div>


					<!-- Algemeen Section -->

					<div class="section-header" @click="changeView('algemeen')" :class="[formSections[0].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[0].active ? 'sectionActive' : '']">1 Algemeen</h3>
					</div>


					<transition name="slide-fade">	
						
						<div v-if="formSections[0].active">

							<algemeen :contract-id="contractId"></algemeen>

						</div>

					</transition>


					<!-- Klantgegevens Section -->

					<div class="section-header" @click="changeView('klantgegevens')" :class="[formSections[1].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[1].active ? 'sectionActive' : '']">2 Klantgegevens</h3>
					</div>

					<transition name="slide-fade">	

						<div v-if="formSections[1].active">

							<klantgegevens :contract-id='contractId'></klantgegevens>

						</div>		
					</transition>	



					<!-- Contactgegevens Section -->
					<div class="section-header" :class="[formSections[2].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[2].active ? 'sectionActive' : '']">3 Contactgegevens</h3>
					</div>

					<transition name="slide-fade">	

						<div v-if="formSections[2].active">

							<contactgegevens :contract-id='contractId'></contactgegevens>

						</div>
					</transition>



					<!-- Contractvorm Section -->
					<div class="section-header" :class="[formSections[3].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[3].active ? 'sectionActive' : '']">4 Contractvorm</h3>
					</div>

					<transition name="slide-fade">	


						<div v-if="formSections[3].active">

							<contractvorm :contract-id='contractId'></contractvorm>

						</div>
					</transition>



					<!-- Operationeel Section -->

					<div class="section-header" :class="[formSections[4].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[4].active ? 'sectionActive' : '']">5 Operationeel</h3>
					</div>

					<transition name="slide-fade">	


						<div v-if="formSections[4].active">

							<Operationeel :contract-id='contractId'></Operationeel>

						</div>
					</transition>




					<!-- Financieel Section -->
					<div class="section-header" :class="[formSections[5].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[5].active ? 'sectionActive' : '']">6 Financieel</h3>
					</div>

					<transition name="slide-fade">	


						<div v-if="formSections[5].active">

							<financieel :contract-id='contractId'></financieel>

						</div>
					</transition>




					<!-- Installatie Section -->
					<div class="section-header" :class="[formSections[6].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[6].active ? 'sectionActive' : '']">7 Instalatie</h3>
					</div>


					<transition name="slide-fade">	
						<div v-if="formSections[6].active">

							<installatie-onderhoud :contract-id='contractId'></installatie-onderhoud>

						</div>
					</transition>




					<!-- Verstuur Section -->
					<div class="section-header" :class="[formSections[7].completed ? 'clickable' : '']">
						<h3 class="section-title" :class="[formSections[7].active ? 'sectionActive' : '']">8 Verstuur</h3>
					</div>


					<transition name="slide-fade">	

						<div v-if="formSections[7].active">

							<verstuur :contract-id='contractId'></verstuur>

						</div>
					</transition>


				</div>
			</div>

		</div>

		<div class="previews-wrapper col-md-3" style="margin:0; padding: 0;" v-if="sectionPreview.length > 0">
			<div class="widget">
				<div class="title">Preview</div>


				<div class="contentwrapper preview-list" style="margin:0; padding: 0;">

					
					<ul v-for="preview in sectionPreview">


						
						<div v-if="preview.sec === 'algemeen'">

							<div v-if=" preview.data != '' ">

								<div class="section-header">
									<h3 class="section-title" :class="[formSections[0].active ? 'sectionActive' : '']">Algemeen</h3>
								</div>

								<li>{{ preview.data.contractVoorDerde }}</li>
								<li><p><b>Mannr</b> {{ preview.data.mannr }}</p></li>
								<li>p {{ preview.data.contractNaam }}</li>
								<li>{{ preview.data.meervest }}</li>
								<li>{{ preview.data.vestigingen }}</li>
								<li>{{ preview.data.imtech }}</li>
								<li>{{ preview.data.contractType }}</li>
								<li>{{ preview.data.algemeenOpmerking }}</li>
							</div>
						</div>



						<div v-if="preview.sec === 'klantgegevens'">

							<div v-if=" preview.data != '' ">

								<div class="section-header">
									<h3 class="section-title" :class="[formSections[1].active ? 'sectionActive' : '']">Klantgegevens</h3>
								</div>


								<li>{{ preview.data.klant_en_opdrachtgever }}</li>
								<li>{{ preview.data.klantType }}</li>
								<li>{{ preview.data.klantNaam }}</li>
								<li>{{ preview.data.klantKvK }}</li>
								<li>{{ preview.data.versklantType }}</li>
								<li>{{ preview.data.naamPartij }}</li>
								<li>{{ preview.data.contractType }}</li>
								<li>{{ preview.data.versklantOpdrgever }}</li>
								<li>{{ preview.data.opdrachtgever }}</li>
								<li>{{ preview.data.versfactuurPartij }}</li>
								<li>{{ preview.data.factuurpartij }}</li>
							</div>

							
						</div>


					</ul>


				</div>

			</div>
		</div>


	</div>

</template>


<style>

	.progress {height: 18px; background: #F2F2F2;}

	.progress .sr-only { 
		position: relative;		
	}

	.section-title {
		background: #B6B5B5;
		color: #FFFFFF; 
		padding: 5px; 
		border-radius: 1px; 
		font-size: 18px;
		text-transform: uppercase;
		font-family: monospace;
	}


	.clickable :hover {
		cursor: pointer;
		background: #D1D0D0;
	}


	.sectionActive {
		background: #7E7E7E;		
	}


	/* Enter and leave animations can use different */
	/* durations and timing functions.              */
	.slide-fade-enter-active {
		transition: .5s;
	}
	.slide-fade-leave-active {
		transition: .1s;
		
	}
	.slide-fade-enter, .slide-fade-leave-active {
		/*padding-left: 10px;*/
		/*opacity: 0;*/
		
	}

</style>