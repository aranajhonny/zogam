@extends('layouts.app')
@section('content')
<form enctype="multipart/form-data" action="{{ url('/upload')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="container-fluid">
    @if(Session::get('message'))
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5> {{ Session::get('message') }}</h5>
        </div>
    </div>
    @endif
  <h2></h2>
  <a href="{{ url('/home') }}" style="float:right; color:teal;" class="btn btn-default"><span class="fa fa-mail-reply-all fa-lg">  LISTADO</span></a><br><br>      
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">/ Datos del vehiculo</div>
        <div class="panel-body">
          <div class="row">
          <input type="hidden" value="{{ strtoupper($auto->id) }}" name="_idAuto">
            <div class="col-md-6"><p><strong>Placa:</strong> {{ strtoupper($auto->placa) }}</p></div>
            <div class="col-md-6"><p><strong>Dueño:</strong> {{ strtoupper($auto->propietario) }}</p></div>
            <div class="col-md-6"><p><strong>Marca:</strong> {{ strtoupper($auto->marca) }}</p></div>
            <div class="col-md-6"><p><strong>Modelo:</strong> {{ strtoupper($auto->modelo) }}</p></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">/ Subir Fotos</div>
        <div class="panel-body">
          <div class="col-md-6">
            <div class="form-group">
            <label for="sel1"><p>Selecione la etapa del proceso.</p></label>
              <select class="form-control" id="sel1" name="_tipoRev" required="true">
                <option></option>
                @foreach ($tiposRev as $tipo)
                  <option value="{{ $tipo }}">{{ $tipo }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="sel1"><p>Selecione la fecha en que se realiz&oacute</p></label><br>
            <input type="date" name="_fechaRev" required="true">
            </div>
          </div>
          <div class="col-md-12 ">
            <div class="form-group image">
              <input id="images-input" name="images[]" type="file" multiple data-preview-file-type="any" class="file" required="true">
            </div>
          </div>
          <center>
          <div class="col-md-12 text-center">
          <br>
          <br>
              <button class="btn btn-success" type="submit"><span class="fa fa-send"></span> Guardar</button>
            <br>
          <br>
          </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
    $("#images-input").fileinput({
        language: "es",
        uploadUrl: '/file-upload-batch/2',
        maxFileCount: 5,
        allowedFileExtensions: ["jpg", "png"]
    });

</script>
</div>  
@endsection
