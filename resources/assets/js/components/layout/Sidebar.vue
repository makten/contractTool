<script>

	export default {


		data () {

			return {

				linkList: [

				{ icon: '<i class="material-icons" aria-hidden="true">dashboard</i>', title: 'Dashboard', link: '/#', active: true },
				{ icon: '<i class="material-icons" aria-hidden="true">people</i>', title: 'Test 1', link: '/#', active: false },
				{ icon: '<i class="material-icons" aria-hidden="true">note_add</i>', title: 'Test 2 ', link: '/#', active: false },
				{ icon: '<i class="fa fa-envelope" aria-hidden="true"></i>', title: 'Test 3', link: '/#', active: false },
				{ icon: '<i class="fa fa-envelope" aria-hidden="true"></i>', title: 'Test 4', link: '/#', active: false },


				],


				logo: 'Hafiz Abass',
				sidebarH: '',

			}
		},

		mounted () {

			this.$nextTick( function() {	

				this.sidebarH = this.$parent.$refs.contentwrapper.offsetHeight;	

				window.addEventListener('resize', this.resizeSidebar);		


			})

			

		},


		methods: {

			resizeSidebar () {				

				this.sidebarH = this.sidebarH = this.$parent.$refs.contentwrapper.offsetHeight;
			},


			/*
			*  Change the active state of clicked link
			*
			*/

			changeActive ( title ) {

				this.linkList = _.map(this.linkList, link => {

					if ( link.title == title) {

						link.active = true;
					}
					else {
						link.active = false;
					}					

					return link;

				});
			}

		},


		computed: {

			sidebarHeight () {				

				// return this.sidebarH + 60;			

			}
		}
		
	}
	
</script> 


<template>

	<div class="side-nav" ref="sidebar">



		<div class="logo">
			<i class="fa fa-tachometer"></i>
			<span> {{ logo }} </span>
		</div>

		<nav class="side-list">

		<div style="height: 80px; background: #1F60C1"></div>

			<ul v-for="item in linkList">

				<li :class="{ active: item.active }">

					<a :href="item.link" @click="changeActive(item.title)">

						<span v-html="item.icon"></span>

						<span> {{ item.title }}

					</a>

				</li>			


			</ul>

		</nav>

	</div>

	</template>


	<style lang="sass">

				

		.side-list ul li a span i {
			color: #FDFAFA !important;
		}

	</style>