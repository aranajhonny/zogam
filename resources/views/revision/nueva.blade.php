@extends('layouts.app')
@section('content')
<div class="container-fluid">
<h2>Subir Fotos</h2>
<form enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
  <div class="col-md-12">
      <div class="col-md-10 col-md-offset-1">
      <div class="form-group">
      <input id="images-input" name="images[]" type="file" multiple data-preview-file-type="any" class="file">
      </div>
    </div>
  </div>

</form>


<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#images-input").fileinput({
    language: "es",
    uploadUrl: "{{ url('/upload')}}", // server upload action
    uploadAsync: true,
    allowedFileExtensions: ["jpg", "png"],
    maxFileCount: 5
});
</script>
</div>  
@endsection
