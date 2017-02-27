var template = `
  <div id="panel-rev" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading " id="head-rev"></div>
        <div class="panel-body panel-rev">

        </div>
      </div>
    </div>
  </div>
   <div id="panel-des" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading " id="head-des"></div>
        <div class="panel-body panel-des">

        </div> 
      </div>
    </div>
  </div>
     <div id="panel-lat" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading " id="head-lat"></div>
        <div class="panel-body panel-lat">

        </div>
      </div>
    </div>
  </div>
       <div id="panel-pre" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading " id="head-pre"></div>
        <div class="panel-body panel-pre">

        </div>
      </div>
    </div>
  </div>
     <div id="panel-pint" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading" id="head-pint"></div>
        <div class="panel-body panel-pint">

        </div>
      </div>
    </div>
  </div>
     <div id="panel-puli" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading" id="head-puli"></div>
        <div class="panel-body panel-puli">

        </div>
      </div>
    </div>
  </div>
  <div id="panel-limp" class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading " id="head-limp"></div>
        <div class="panel-body panel-limp">

        </div>
      </div>
    </div>
  </div>
     <div id="panel-arma"  class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading" id="head-arma"></div>
        <div class="panel-body panel-arma">

        </div>
      </div>
    </div>
  </div>
`;
$(document).ready(function() {
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

  $.get(/*'{{ url('getimages') }}' +'/'+*/ placa, function(data) {
    if (data.length === 0) {
      swal('El vehiculo no posee ninguna revisi&oacuten');
    }
    NProgress.done();

    if (data.status === 'error') {
      swal('El vehiculo no esta registrado');
    }
    $('.buscar-panel').hide();
    $('.superior').append(
      `
    <a href="{{ url('/auto') }}" style="float:left; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg">  LISTADO</span></a><br><br>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">/ Datos del vehiculo</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6"><p><strong>Placa:</strong> ${data.auto.placa}</p></div>
            <div class="col-md-6"><p><strong>Dueño:</strong> ${data.auto.propietario}</p></div>
            <div class="col-md-6"><p><strong>Marca:</strong> ${data.auto.marca}</p></div>
            <div class="col-md-6"><p><strong>Modelo:</strong> ${data.auto.placa}</p></div>
          </div>
        </div>
      </div>
    </div>
`
    );
    $.each(data.data, function(index, image) {
      if (image.tipo == 'recepcion') {
        $('#panel-rev').removeClass('hidden');
        if (!$('#head-rev').hasClass('head-rev')) {
          $('#head-rev').addClass('head-rev');
          $('.head-rev').append(
            '<span>Revisi&oacuten</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-rev').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'desarmado') {
        $('#panel-des').removeClass('hidden');
        if (!$('#head-des').hasClass('head-des')) {
          $('#head-des').addClass('head-des');
          $('.head-des').append(
            '<span>Desarmado</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-des').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'latoneria') {
        $('#panel-lat').removeClass('hidden');
        if (!$('#head-lat').hasClass('head-lat')) {
          $('#head-lat').addClass('head-lat');
          $('.head-lat').append(
            '<span>Latoneria</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-lat').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'preparacion') {
        $('#panel-pre').removeClass('hidden');
        if (!$('#head-pre').hasClass('head-pre')) {
          $('#head-pre').addClass('head-pre');
          $('.head-pre').append(
            '<span>Preparacion</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-pre').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'pintura') {
        $('#panel-pint').removeClass('hidden');
        if (!$('#head-pint').hasClass('head-pint')) {
          $('#head-pint').addClass('head-pint');
          $('.head-pint').append(
            '<span>Pintura</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-pint').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'limpieza') {
        $('#panel-limp').removeClass('hidden');
        if (!$('#head-limp').hasClass('head-limp')) {
          $('#head-limp').addClass('head-limp');
          $('.head-limp').append(
            '<span>Limpieza</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-limp').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'pulitura') {
        $('#panel-puli').removeClass('hidden');
        if (!$('#head-puli').hasClass('head-puli')) {
          $('#head-puli').addClass('head-puli');
          $('.head-puli').append(
            '<span>Pulitura</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-puli').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'armado') {
        $('#panel-arma').removeClass('hidden');
        if (!$('#head-arma').hasClass('head-arma')) {
          $('#head-arma').addClass('head-arma');
          $('.head-arma').append(
            '<span>Armado</span> / <span>' + image.fecha + '</span>'
          );
        }
        $('.panel-arma').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      }
    });
  });
}
