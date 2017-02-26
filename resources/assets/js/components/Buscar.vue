<template>
    <div class="container superior">
	<div class="row buscar-panel">
		<div class="col-md-6 col-md-offset-3 ">
			<div class="panel panel-info">
				<div class="panel-heading">Mi Vehículo <span></span></div>

				<div class="panel-body">
					<p>Introduzca la Matricula del Vehículo</p>

					<div class="input-group">
						<input type="text" class="form-control" placeholder="Introduzca la matricula..." id="placa" onkeyup="this.value=this.value.toUpperCase()">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" v-on:click="buscar"><span class="fa fa-search"></span> Buscar!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="vehiculo" v-if="show">
		<Vehiculo :auto="Vehiculo"></Vehiculo>
	</div>
	<div class="vehiculo" v-if="show">
		<Fotos v-for="fotos in Items" :fotos="fotos"></Fotos>
	</div>
    </div>
</template>

<script>
	import Vehiculo from './Vehiculo.vue'
	import Fotos from './Fotos.vue'	
	import NProgress from 'nprogress'	
	import fetch from 'unfetch'

	NProgress.configure({ 
		easing: 'ease', 
		speed: 200, 
		showSpinner: false 
	});

	export default {
		components: {
			Vehiculo,
			Fotos
  		},
		data() {
			return {
				show: false,
				Items: [],
				Vehiculo: []
			}
		},
		methods: {
			buscar() {
				NProgress.start();
				var placa = $('#placa').val();
				if (!placa) {
					NProgress.done();					
					swal('Introduzca un numero de matricula');
				}
				fetch('getimages' + '/' + placa)
					.then(r => r.json())
					.then(data => {
						if (data.status == 'error') {
							NProgress.done();
							swal('El vehiculo no esta registrado');
						}else if (data.data.length === 0) {
							NProgress.done();
							swal('El vehiculo no posee ninguna revisi&oacuten');
						}else {
							NProgress.done();
							$('.buscar-panel').hide();
							this.show = true
							this.Vehiculo = data.auto
							this.Items = data.data
						}
					});
			}
		}

	}
</script>