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

			}
		}





	}

</script>

<template>

	<div class="main">

		<div class="contract-wrapper">

			<div class="widget">

				<div class="title">Number of views</div>

				<div class="contentwrapper" style="min-width: 40%;">


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