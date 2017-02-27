<template>
    <div>
        <a href="auto" style="float:left; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg">  REGRESAR</span></a><br><br>
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">/ Datos del vehiculo</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Placa:</strong> {{ auto.placa.toUpperCase() }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Dueño:</strong> {{ auto.propietario.toUpperCase()}} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Marca:</strong> {{ auto.marca.toUpperCase() }} </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Modelo:</strong> {{ auto.modelo.toUpperCase() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>
<script>
    export default {
        props: ['auto']
    }
</script>