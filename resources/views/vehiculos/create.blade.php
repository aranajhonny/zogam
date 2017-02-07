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
    <a href="{{ url('/home') }}" style="float:right; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg">  LISTADO</span></a><br><br>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading"><center>Registrar Nuevo Vehículo</center> </div>
        <div class="panel-body">
          <form method="post" action="{{ url('/vehiculo') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="col-md-12"> 
             <div class="col-md-offset-1 col-md-4">   
              <div class="form-group @if ($errors->has('placa')) has-error @endif">                
                <label>Matrícula</label>
                <input type="text" placeholder="VEN07Y" maxlength="6" class="form-control" name="placa">
                @if ($errors->has('placa')) <p class="help-block"> Este campo es requerido.</p> @endif
              </div>
            </div>          
             <div class="col-md-offset-1 col-md-4">   
            
              <div class="form-group @if ($errors->has('marca')) has-error @endif">                
                <label>Marca</label>
                <input type="text" placeholder="Ferrari" class="form-control" name="marca">
                @if ($errors->has('marca')) <p class="help-block"> Este campo es requerido.</p> @endif    
              </div>
             </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('modelo')) has-error @endif">                
                <label>Modelo</label>
                <input type="text" placeholder="570T" class="form-control" name="modelo">
                @if ($errors->has('modelo')) <p class="help-block"> Este campo es requerido.</p> @endif   
              </div>
               </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('anio')) has-error @endif">                
                <label>Año</label>
                <input type="text" placeholder="2015" maxlength="4" size="4" class="form-control" name="anio">
                @if ($errors->has('anio')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>              
               </div>          
             <div class="col-md-offset-1 col-md-4">  
              <div class="form-group @if ($errors->has('serial_motor')) has-error @endif">                
                <label>Serial del Motor</label>
                <input type="text" placeholder="538H37893692N" class="form-control" name="serial_motor">
                @if ($errors->has('serial_motor')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>   
               </div>          
             <div class="col-md-offset-1 col-md-4">  

              <div class="form-group @if ($errors->has('serial_carro')) has-error @endif">                
                <label>Serial del Vehículo</label>
                <input type="text" placeholder="89298M2FYN" class="form-control" name="serial_carro">
                @if ($errors->has('serial_carro')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>    
               </div>          
             <div class="col-md-offset-1 col-md-4">            
              <div class="form-group @if ($errors->has('color')) has-error @endif">                
                <label>Color</label>
                <input type="text" placeholder="Negro" class="form-control" name="color">
                @if ($errors->has('color')) <p class="help-block"> Este campo es requerido.</p> @endif  
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('tipo')) has-error @endif">                
                <label>Tipo</label>
                <select class="form-control" name="tipo" placeholder="Ligero">
                  <option></option>
                  <option value="Ligero">Ligero</option>
                  <option value="Carga">Carga</option>
                </select>
                @if ($errors->has('tipo')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('propietario')) has-error @endif">                
                <label>Propietario</label>
                <input type="text" placeholder="Osward" class="form-control" name="propietario">
                @if ($errors->has('propietario')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>              
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('telf_prop')) has-error @endif">                
                <label>Teléfono</label>
                <input type="text" placeholder="0414-XXXXXXX" class="form-control" name="telf_prop">
                @if ($errors->has('telf_prop')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>   
              </div>          
             <div class="col-md-offset-1 col-md-4">     
              <div class="form-group @if ($errors->has('email_prop')) has-error @endif">               
                <label><strong>Email</strong></label>
                <input type="email" placeholder="example@gmail.com" class="form-control" name="email_prop">
                @if ($errors->has('email_prop')) <p class="help-block"> Este campo es requerido.</p> @endif 
              </div>       
            </div>    
          </div>     

          <div class="col-md-12 text-center">
            <div class="col-md-offset-4 col-md-4">
              <button type="submit" class="btn btn-success" style=""><span class="fa fa-save"></span> Guardar</button>
            </div> 
          </div>    
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
