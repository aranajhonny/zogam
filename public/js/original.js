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
     <div id="panel-arma"  class="row panel-nuevo hidden">
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading" id="head-arma"></div>
        <div class="panel-body panel-arma">

        </div>
      </div>
    </div>
  </div>
`
$( document ).ready(function() {
  $('.panel-nuevo').empty();
});
function buscar() {
  $('.panel-nuevo').remove();
  $('.buscar-panel').append(template)
  NProgress.configure({ easing: 'ease', speed: 200, showSpinner: false });
  NProgress.start();
  var placa = $('#placa').val();
  if (!placa) {
    swal('Introduzca un numero de matricula');
    NProgress.done();
  }

  $.get( '/' + placa, function(data) {
    NProgress.done();

    if (data.status === 'error') {
      swal('El vehiculo no esta registrado');
    }
    $.each(data, function(index, image) {
      if (image.tipo == 'revision') {
        $("#panel-rev").removeClass('hidden');
        if (!$("#head-rev").hasClass('head-rev')) {
          $("#head-rev").addClass('head-rev')
          $('.head-rev').append('<span>Revisi&oacuten</span> / <span>'+image.fecha+'</span>')
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
        $("#panel-des").removeClass('hidden');
        if (!$("#head-des").hasClass('head-des')) {
          $("#head-des").addClass('head-des')
          $('.head-des').append('<span>Desarmado</span> / <span>'+image.fecha+'</span>')
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
        $("#panel-lat").removeClass('hidden');
        if (!$("#head-lat").hasClass('head-lat')) {
          $("#head-lat").addClass('head-lat')
          $('.head-lat').append('<span>Latoneria</span> / <span>'+image.fecha+'</span>')
        }
        $('.panel-lat').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'pintura') {
        $("#panel-pint").removeClass('hidden');
        if (!$("#head-pint").hasClass('head-pint')) {
          $("#head-pint").addClass('head-pint')
          $('.head-pint').append('<span>Pintura</span> / <span>'+image.fecha+'</span>')
        }
        $('.panel-pint').append(
          ` 
          <div class="col-md-4">
                <div class="thumbnail"> 
                  <img src="images/${image.nombre}" alt="Lights" style="width:300px">
                </div>
              </div>`
        );
      } else if (image.tipo == 'pulitura') {
        $("#panel-puli").removeClass('hidden');
        if (!$("#head-puli").hasClass('head-puli')) {
          $("#head-puli").addClass('head-puli')
          $('.head-puli').append('<span>Pulitura</span> / <span>'+image.fecha+'</span>')
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
        $("#panel-arma").removeClass('hidden');
        if (!$("#head-arma").hasClass('head-arma')) {
          $("#head-arma").addClass('head-arma')
          $('.head-arma').append('<span>Armado</span> / <span>'+image.fecha+'</span>')
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
