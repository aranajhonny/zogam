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
    </div>
</template>

<script>
    export default {
        methods: {
            buscar() {
                console.log('get')
            }
        }

    }
</script>
