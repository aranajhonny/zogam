@extends('layouts.app')

@section('content')
<div class="container superior">
<div class="vehiculo">
  <div>
    <a href="auto" style="float:right; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg">  Regresar</span></a><br><br>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">/ DATOS DEL VEHICULO</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <p><strong>Placa:</strong> {{ $auto->placa}}</p>
            </div>
            <div class="col-md-6">
              <p><strong>Propietario:</strong> {{ $auto->propietario}}</p>
            </div>
            <div class="col-md-6">
              <p><strong>Marca:</strong> {{ $auto->marca}}</p>
            </div>
            <div class="col-md-6">
              <p><strong>Modelo:</strong> {{ $auto->modelo}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container">
@forelse ($data as $valor)
@if (count($valor) > 0)
 <div>
  <div>
    <div id="panel-rev" class="row panel-nuevo ">
      <div class="col-md-12 ">
        <div class="fotos" >
          <div class="panel panel-info">
            <div class="panel-heading " id="head-rev">
              <span>
                @foreach ($valor as $b) 
                  @if ($loop->first)
                    / {{ strtoupper(trans($b->tipo)) }} 
                  @endif
                @endforeach
              </span>
            </div>
            <div class="panel-body panel-rev">
              <div class="fotos">
              @foreach ($valor as $a)
               @if ($a->image_id > 0)
                <div class="col-md-3">
                  <div class="thumbnail" style="">
                    <img src="images/{{ $a->nombre }}" class="img-responsive" width="300" height="300" >
                    <div style="text-align: center; color:#31708f; padding-top:5px;">
                        <?php
                          $date = new DateTime($a->fecha);
                          echo $date->format('d-m-Y');
                         ?>
                    </div>                                                                                    
                  </div>
                </div>
           @endif
            @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@empty
    <!-- <p>No posee nada</p> -->
@endforelse
</div>

@endsection
