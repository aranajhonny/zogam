@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(Session::get('message'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5> {{ Session::get('message') }}</h5>
        </div>
    </div>
    @endif
    @if(Session::get('errors'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>Complete los campos obligatorios.</h5>
        </div>
    </div>
    @endif 
    <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-info">
    <div class="panel-heading"><center> Editar vehiculo</center> </div>
    <div class="panel-body">
     <form class="" action=" {{ url('/vehiculo') }}/{{ $auto->id }}" method="post">
        <div class="col-md-12"> 
          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('placa')) has-error @endif">
            <label for="">Placa</label>
            <input required="true" type="text" class="form-control" name="placa" value="{{ $auto->placa }}" placeholder="Placa">
            @if ($errors->has('placa')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('marca')) has-error @endif">
            <label for="">Marca</label>
            <input required="true" type="text" class="form-control" name="marca" value="{{ $auto->marca }}" placeholder="marca">
            @if ($errors->has('marca')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('modelo')) has-error @endif">
            <label for="">Modelo</label>
            <input required="true" type="text" class="form-control" name="modelo" value="{{ $auto->modelo }}" placeholder="modelo">
            @if ($errors->has('modelo')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('anio')) has-error @endif">
            <label for="">Año</label>
             <input class="form-control" name="anio" value="{{ $auto->anio }}" placeholder="año" required="true">
            @if ($errors->has('anio')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('serial_motor')) has-error @endif">
            <label for="">Serial del motor</label>
            <input required="true" type="text" class="form-control" name="serial_motor" value="{{ $auto->serial_motor }}" placeholder="serial motor">
            @if ($errors->has('serial_motor')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('serial_carro')) has-error @endif">
            <label for="">Serial de la carroceria</label>
            <input required="true" type="text" class="form-control" name="serial_carro" value="{{ $auto->serial_carro }}" placeholder="serial carro">
            @if ($errors->has('serial_carro')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('color')) has-error @endif">
            <label for="">Color</label>
            <input required="true" type="text" class="form-control" name="color" value="{{ $auto->color }}" placeholder="color">
            @if ($errors->has('color')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('tipo')) has-error @endif">
            <label for="">Tipo de veh&iacuteculo</label>
            <input required="true" type="text" class="form-control" name="tipo" value="{{ $auto->tipo }}" placeholder="tipo">
            @if ($errors->has('tipo')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('propietario')) has-error @endif">
            <label for="">Propietario</label>
            <input required="true" type="text" title="SOLO LETRAS" placeholder="Nombre y/o Apellidos" class="form-control" name="propietario" value="{{ $auto->propietario }}" placeholder="propietario">
            @if ($errors->has('propietario')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('telf_prop')) has-error @endif">
          <label for="telefono">Tel&eacutefono</label>
            <input required="true" type="text" title="0244-9999999"  pattern="^([0-9]{4})-([0-9]{7})$" class="form-control" name="telf_prop" value="{{ $auto->telf_prop }}" placeholder="0244-9999999">
            @if ($errors->has('telf_prop')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    

          <div class="col-md-offset-1 col-md-4">     
          <div class="form-group @if ($errors->has('email_prop')) has-error @endif">
            <label for="">Correo electronico</label>
            <input required="true"  class="form-control" name="email_prop" value="{{ $auto->email_prop }}" placeholder="email propietario">
            @if ($errors->has('email_prop')) <p class="help-block"> Este campo es requerido.</p> @endif <br>
          </div>
      </div>    
    </div>    

      <input required="true" type="hidden" name="_method" value="put">

      <input required="true" type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group @if ($errors->has('name')) has-error @endif col-md-2 col-md-offset-5">
      </div>
      <div class="row">
      <div class="col-md-12 text-center" style="margin-bottom: 50px;">
        <button type="submit" name="name" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
        <button class="btn btn-warning" onclick="javascript: window.history.back()"><span class="fa fa-arrow-left"></span> Volver</button>

        <br>
      </div>
      </div>
    </form>
  </div>
  </div>
  </div>
</div>
</div>
@endsection
