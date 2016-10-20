<script>

	import { Algemeen, Klantgegevens, Contactgegevens, Contractvorm, Operationeel, Financieel, InstallatieOnderhoud, Uitvoerlocatie, Verstuur} from './sections/index';
	
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

				completed: 0,

			}
		},


		created () {

			eventBroadcaster.$on('algemeen-completed', this.incrementCompleted)
		},


		methods: {

			incrementCompleted () {
					this.completed += 14.28;

					console.log(this.completed);
			}

		}





	}

</script>

<template>

	<div class="main">

		<div class="contract-wrapper col-md-9">

			<div class="widget">

				<div class="title">Nieuwe contract</div>

				<div class="contentwrapper">

					<div class="progress progress-striped">
						<div class="progress-bar progress-bar-success" :style="{ width: completed + '%' }"></div>
					</div>


					<algemeen></algemeen>					

					<klantgegevens></klantgegevens>

					<contactgegevens></contactgegevens>

					<contractvorm></contractvorm>

					<financieel></financieel>

					<installatie-onderhoud></installatie-onderhoud>

					<verstuur></verstuur>

				</div>
			</div>

		</div>


	</div>



</template>


<style lang="sass">
	
	
</style>