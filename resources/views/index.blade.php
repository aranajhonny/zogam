<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Zogan System</title>

  <!-- Styles -->
  <link href="{{asset('css/all.css')}} " rel="stylesheet">
  <link href="{{asset('fileinput/css/fileinput.min.css')}} " media="all" rel="stylesheet" type="text/css" />

  <link href="{{asset('css/vendor/estilos.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/alert.css')}}" >
  <link rel="stylesheet" href="{{asset('css/nprogress.css')}}" >

  <script  src="{{asset('js/vendor/jquery.js')}} "></script>
  <script  src="{{asset('js/all.js')}} "></script>
  <script  src="{{asset('fileinput/js/fileinput.js')}} " type="text/javascript"></script>
  <script  src="{{asset('fileinput/js/locales/es.js')}} " type="text/javascript"></script>
  <script  src="{{asset('js/alert.js')}} " type="text/javascript"></script>
  <script  src="{{asset('js/nprogress.js')}} " type="text/javascript"></script>
  <script  src="{{asset('js/jquery.goup.js')}} " type="text/javascript"></script>  
  
  <script src=""></script>
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
<script>
jQuery(document).ready(function(){
jQuery.goup();
});
</script>    
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top"  >
        <div class="container">
          <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class=" li-nav navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Mostrar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">
              <img alt="Brand" src="{{asset('/img/gandocam.png')}}" class="img-responsive" width="120px">
            </a>
            @else
            <a class="navbar-brand" href="{{ url('/') }}">
              <img alt="Brand" src="{{asset('/img/gandocam.png')}}" class="img-responsive" width="120px">
            </a>
            @endif
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
              <li class="li-nav"><a href="http://gandocam.com.ve">Sitio principal</a></li>
              <li class="li-nav"><a href="http://gandocam.com.ve/servicios/">Servicios</a></li>
              <li class="li-nav"><a href="http://gandocam.com.ve/contactanos/">Contáctanos</a></li>
              <!-- <li class="li-nav"><a href="{{ url('/login') }}">Entrar</a></li> -->
              <!-- <li><a href="{{ url('/register') }}">Registrarse</a></li> -->
              @else
              <li class="dropdown li-nav">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar sesión
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
  </div>
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
							<button class="btn btn-default" type="button" onclick="javascript:buscar()"><span class="fa fa-search"></span> Buscar!</button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
<div class="box">
</div>
</div>
<script>
'use strict';

var template = '\n  <div id="panel-rev" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-rev"></div>\n        <div class="panel-body panel-rev">\n\n        </div>\n      </div>\n    </div>\n  </div>\n   <div id="panel-des" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-des"></div>\n        <div class="panel-body panel-des">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-lat" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-lat"></div>\n        <div class="panel-body panel-lat">\n\n        </div>\n      </div>\n    </div>\n  </div>\n       <div id="panel-pre" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-pre"></div>\n        <div class="panel-body panel-pre">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-pint" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-pint"></div>\n        <div class="panel-body panel-pint">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-puli" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-puli"></div>\n        <div class="panel-body panel-puli">\n\n        </div>\n      </div>\n    </div>\n  </div>\n  <div id="panel-limp" class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading " id="head-limp"></div>\n        <div class="panel-body panel-limp">\n\n        </div>\n      </div>\n    </div>\n  </div>\n     <div id="panel-arma"  class="row panel-nuevo hidden">\n    <div class="col-md-12 ">\n      <div class="panel panel-info">\n        <div class="panel-heading" id="head-arma"></div>\n        <div class="panel-body panel-arma">\n\n        </div>\n      </div>\n    </div>\n  </div>\n';
$(document).ready(function () {
  $('.panel-nuevo').empty();
});
function buscar() {
  $('.panel-nuevo').remove();
  $('.box').append(template);
  NProgress.configure({ easing: 'ease', speed: 200, showSpinner: false });
  NProgress.start();
  var placa = $('#placa').val();
  if (!placa) {
    swal('Introduzca un numero de matricula');
    NProgress.done();
  }

  $.get( '{{ url('getimages') }}' +'/'+placa, function (data) {
    if (data.length === 0) {
      swal('El vehiculo no posee ninguna revisi&oacuten');
    }
    NProgress.done();

    if (data.status === 'error') {
      swal('El vehiculo no esta registrado');
    }
    $('.buscar-panel').hide();
    $('.superior').append('\n    <a href="{{ url('/auto') }}" style="float:left; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg"> Regresar</span></a><br><br>\n    <div class="col-md-8 col-md-offset-2">\n      <div class="panel panel-info">\n        <div class="panel-heading">/ Datos del vehiculo</div>\n        <div class="panel-body">\n          <div class="row">\n            <div class="col-md-6"><p><strong>Placa:</strong> ' + data.auto.placa + '</p></div>\n            <div class="col-md-6"><p><strong>Due\xF1o:</strong> ' + data.auto.propietario + '</p></div>\n            <div class="col-md-6"><p><strong>Marca:</strong> ' + data.auto.marca + '</p></div>\n            <div class="col-md-6"><p><strong>Modelo:</strong> ' + data.auto.placa + '</p></div>\n          </div>\n        </div>\n      </div>\n    </div>\n');
    $.each(data.data, function (index, image) {
      if (image.tipo == 'recepcion') {
        $('#panel-rev').removeClass('hidden');
        if (!$('#head-rev').hasClass('head-rev')) {
          $('#head-rev').addClass('head-rev');
          $('.head-rev').append('<span>Revisi&oacuten</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-rev').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'desarmado') {
        $('#panel-des').removeClass('hidden');
        if (!$('#head-des').hasClass('head-des')) {
          $('#head-des').addClass('head-des');
          $('.head-des').append('<span>Desarmado</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-des').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'latoneria') {
        $('#panel-lat').removeClass('hidden');
        if (!$('#head-lat').hasClass('head-lat')) {
          $('#head-lat').addClass('head-lat');
          $('.head-lat').append('<span>Latoneria</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-lat').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'preparacion') {
        $('#panel-pre').removeClass('hidden');
        if (!$('#head-pre').hasClass('head-pre')) {
          $('#head-pre').addClass('head-pre');
          $('.head-pre').append('<span>Preparacion</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-pre').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'pintura') {
        $('#panel-pint').removeClass('hidden');
        if (!$('#head-pint').hasClass('head-pint')) {
          $('#head-pint').addClass('head-pint');
          $('.head-pint').append('<span>Pintura</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-pint').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'limpieza') {
        $('#panel-limp').removeClass('hidden');
        if (!$('#head-limp').hasClass('head-limp')) {
          $('#head-limp').addClass('head-limp');
          $('.head-limp').append('<span>Limpieza</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-limp').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'pulitura') {
        $('#panel-puli').removeClass('hidden');
        if (!$('#head-puli').hasClass('head-puli')) {
          $('#head-puli').addClass('head-puli');
          $('.head-puli').append('<span>Pulitura</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-puli').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      } else if (image.tipo == 'armado') {
        $('#panel-arma').removeClass('hidden');
        if (!$('#head-arma').hasClass('head-arma')) {
          $('#head-arma').addClass('head-arma');
          $('.head-arma').append('<span>Armado</span> / <span>' + image.fecha + '</span>');
        }
        $('.panel-arma').append(' \n          <div class="col-md-4">\n                <div class="thumbnail"> \n                  <img src="images/' + image.nombre + '" alt="Lights" style="width:300px">\n                </div>\n              </div>');
      }
    });
  });
}
</script> 
</body>
</html>
