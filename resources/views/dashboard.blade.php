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
        <div class="panel-heading">Home</div>
        <div class="panel-body">
          <div class="container">
            <div class="table-responsive">
              <table class="table"> 
               <caption>Vehículos Registrados</caption> 
               <thead> 
                 <tr> 
                   <th>#</th> 
                   <th>Placa</th> 
                   <th>Marca / Modelo</th> 
                   <th>Propietario</th> 
                   <th>Estatus</th>
                   <th>Acciones</th> 
                 </tr> 
               </thead>
               <tbody> 
                @foreach ($autos as $auto)
                <tr> 
                  <th scope="row">{{ $auto->id}}</th> 
                  <td>{{ strtoupper($auto->placa) }}</td> 
                  <td>{{ strtoupper($auto->marca) }} - {{ strtoupper($auto->modelo)}}</td> 
                  <td>{{ strtoupper($auto->propietario) }}</td>
                  <td>{{ strtoupper($auto->status) }}</td>
                  <td>
                    <a href="{{ route('vehiculo.edit', $auto->id) }}" class="btn btn-warning btn-xs" title="Editar Registro del Vehículo"><i class="fa fa-edit fa-lg"></i></a>
                    @if ($auto->status == "completo")
                      <a class="btn btn-success btn-xs" title="Agregar revision al vehículo"><i class="fa fa-camera"></i>
                    </a>
                    @else
                    <a href="{{ url('revision') }}/{{ $auto->id }}" class="btn btn-success btn-xs" title="Agregar revision al vehículo"><i class="fa fa-camera fa-lg"></i>
                    </a>
                    @endif

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
