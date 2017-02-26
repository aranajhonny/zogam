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
    @if(Session::get('status'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>Un vehículo con la misma placa ya esta registrado.</h5>
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
        <div class="panel-heading"><center>Registrar Nuevo Vehículo</center> </div>
        <div class="panel-body">
          <form method="post" action="{{ url('/vehiculo') }}">
           <input required="true" type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="col-md-12"> 
             <div class="col-md-offset-1 col-md-4">   
              <div class="form-group @if ($errors->has('placa')) has-error @endif">                
                <label>Matrícula</label>
                <input required="true" type="text" maxlength="7" onkeyup="this.value=this.value.toUpperCase()" placeholder="VEN027Y" class="form-control" name="placa">
                @if ($errors->has('placa')) <p class="help-block"> Este campo es requerido.</p> @endif
              </div>
            </div>          
             <div class="col-md-offset-1 col-md-4">   
            
              <div class="form-group @if ($errors->has('marca')) has-error @endif">                
                <label>Marca</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" placeholder="Ferrari" class="form-control" name="marca">
                @if ($errors->has('marca')) <p class="help-block"> Este campo es requerido.</p> @endif    
              </div>
             </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('modelo')) has-error @endif">                
                <label>Modelo</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" placeholder="570T" class="form-control" name="modelo">
                @if ($errors->has('modelo')) <p class="help-block"> Este campo es requerido.</p> @endif   
              </div>
               </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('anio')) has-error @endif">                
                <label>Año</label>
                <input type="number" placeholder="2015" class="form-control" name="anio" required="true">
                @if ($errors->has('anio')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>              
               </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('serial_motor')) has-error @endif">                
                <label>Serial del Motor</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" placeholder="538H37893692N" class="form-control" name="serial_motor">
                @if ($errors->has('serial_motor')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>   
               </div>          
             <div class="col-md-offset-1 col-md-4">  

              <div class="form-group @if ($errors->has('serial_carro')) has-error @endif">                
                <label>Serial del Vehículo</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" placeholder="89298M2FYN" class="form-control" name="serial_carro">
                @if ($errors->has('serial_carro')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>    
               </div>          
             <div class="col-md-offset-1 col-md-4">            
              <div class="form-group @if ($errors->has('color')) has-error @endif">                
                <label>Color</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" placeholder="Negro" class="form-control" name="color">
                @if ($errors->has('color')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('tipo')) has-error @endif">                
                <label>Tipo</label>
                <input  class="form-control" name="tipo" onkeyup="this.value=this.value.toUpperCase()" value="" placeholder="Carga, Etc." required="true">
                @if ($errors->has('tipo')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('propietario')) has-error @endif">                
                <label>Propietario</label>
               <input type="text" title="SOLO LETRAS" onkeyup="this.value=this.value.toUpperCase()" placeholder="Nombre y/o Apellidos"  class="form-control" name="propietario">
                @if ($errors->has('propietario')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('telf_prop')) has-error @endif">                
                <label>Teléfono</label>
                <input required="true" type="text" onkeyup="this.value=this.value.toUpperCase()" title="0414-9999999" placeholder="0414-XXXXXXX" class="form-control"  pattern="^([0-9]{4})-([0-9]{7})$" name="telf_prop">
                @if ($errors->has('telf_prop')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>   
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('email_prop')) has-error @endif">               
                <label><strong>Email</strong></label>
                <input required="true" type="email" placeholder="example@gmail.com" class="form-control" name="email_prop">
                @if ($errors->has('email_prop')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>       
            </div>    
          </div>     

          <div class="col-md-12 text-center">
            <div class="col-md-offset-4 col-md-4">
              <button type="submit" class="btn btn-success" style=""><span class="fa fa-save"></span> Guardar</button>
              <button class="btn btn-warning" onclick="javascript: window.history.back()"><span class="fa fa-arrow-left"></span> Volver</button>

            </div> 
          </div>    
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
