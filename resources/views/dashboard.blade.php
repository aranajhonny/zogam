@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-md-12">
    <div class="text-right nuevo-veh">
      <a href="{{ url('/vehiculo/create') }}" class="btn btn-info"><span class="fa fa-truck"> NUEVO VEHICULO</span></a>
    </div>
  </div>
    <div class="col-md-12 ">
      <div class="panel panel-info">
        <div class="panel-heading">/ Home</div>
        <div class="panel-body">
          <div class="container">
            <div class="table-responsive">
              <table class="table"> 
               <caption>Vehiculos registrados</caption> 
               <thead> 
                 <tr> 
                   <th>#</th> 
                   <th>Placa</th> 
                   <th>Marca / Modelo</th> 
                   <th>Propietario</th> 
                   <th>Acciones</th> 
                 </tr> 
               </thead>
               <tbody> 
                @foreach ($autos as $auto)
                <tr> 
                  <th scope="row">{{ $auto->id}}</th> 
                  <td>{{ $auto->placa }}</td> 
                  <td>{{ $auto->marca }} - {{ $auto->modelo}}</td> 
                  <td>{{ $auto->propietario }}</td>
                  <td>
                    <a href="{{ route('vehiculo.edit', $auto->id) }}" class="btn btn-warning btn-xs" title="Editar Registro del Vehículo"><i class="fa fa-edit"></i></a>
                    
                    <a href="{{ url('revisiones') }}/{{ $auto->id }}" class="btn btn-success btn-xs" title="Agregar revision al vehículo"><i class="fa fa-camera"></i>
                    </a>

                  </td>
                </tr>
                @endforeach
              </tbody> 
            </table>

          </div>
        </div>
        {{ $autos->links() }}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
