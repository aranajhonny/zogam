@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row buscar-panel">
		<div class="col-md-6 col-md-offset-3 ">
			<div class="panel panel-info">
				<div class="panel-heading">Mi Vehículo <span></span></div>

				<div class="panel-body">
					<p>Intoduzca la Matricula del vehículo</p>

					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for..." id="placa">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" onclick="javascript:buscar()"><span class="fa fa-search"></span> Buscar!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
<script>
'use strict';

var template = '\n  <div id="panel-rev" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-rev"></div>\n        <div class="panel-body panel-rev">\n\n        </div>\n      </div>\n    </div>\n  </div>\n   <div id="panel-des" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-des"></div>\n        <div class="panel-body panel-des">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-lat" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-lat"></div>\n        <div class="panel-body panel-lat">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-pint" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-pint"></div>\n        <div class="panel-body panel-pint">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-puli" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-puli"></div>\n        <div class="panel-body panel-puli">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-arma"  class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-arma"></div>\n        <div class="panel-body panel-arma">\n\n        </div>\n      </div>\n    </div>\n  </div>\n';
$(document).ready(function () {
  $('.panel-nuevo').remove();
});
function buscar() {
  $('.panel-nuevo').remove();
  
  $('.buscar-panel').append(template);
  NProgress.configure({ easing: 'ease', speed: 200, showSpinner: false });
  NProgress.start();
  var placa = $('#placa').val();
  if (!placa) {
    swal('Introduzca un numero de matricula');
    NProgress.done();
  }

  $.get('{{ url('getimages') }}' +'/' + placa, function (data) {
    NProgress.done();

    if (data.status === 'error') {
      swal('El vehiculo no esta registrado');
    }
    $.each(data, function (index, image) {
      if (image.tipo == 'revision') {
        $("#panel-rev").removeClass('hidden');
        if (!$("#head-rev").hasClass('head-rev')) {
          $("#head-rev").addClass('head-rev');
          $('.head-rev').append('<span>Revisi&oacuten</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-rev').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'desarmado') {
        $("#panel-des").removeClass('hidden');
        if (!$("#head-des").hasClass('head-des')) {
          $("#head-des").addClass('head-des');
          $('.head-des').append('<span>Desarmado</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-des').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'latoneria') {
        $("#panel-lat").removeClass('hidden');
        if (!$("#head-lat").hasClass('head-lat')) {
          $("#head-lat").addClass('head-lat');
          $('.head-lat').append('<span>Latoneria</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-lat').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'pintura') {
        $("#panel-pint").removeClass('hidden');
        if (!$("#head-pint").hasClass('head-pint')) {
          $("#head-pint").addClass('head-pint');
          $('.head-pint').append('<span>Pintura</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-pint').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'pulitura') {
        $("#panel-puli").removeClass('hidden');
        if (!$("#head-puli").hasClass('head-puli')) {
          $("#head-puli").addClass('head-puli');
          $('.head-puli').append('<span>Pulitura</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-puli').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'armado') {
        $("#panel-arma").removeClass('hidden');
        if (!$("#head-arma").hasClass('head-arma')) {
          $("#head-arma").addClass('head-arma');
          $('.head-arma').append('<span>Armado</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-arma').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img data-action="zoom" src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      }
    });
  });
}
</script> 
@endsection
