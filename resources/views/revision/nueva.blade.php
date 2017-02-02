@extends('layouts.app')
@section('content')
<h2>Add new post</h2>
  <form class="" action="{{ url('/upload')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <img src="{{ asset('img/100x100.png')}} " id="showimages" style="max-width:200px;max-height:200px;float:left;"/>
    <div class="row">
      <div class="col-md-12">
        <input type="file" multiple="false" id="inputimages" name="images">
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary pull-right" value="post">
        Submit
      </button>
    </div>
  </form>


<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $("#showimages").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$('#inputimages').change(function() {
  readURL(this);
});

  </script>
@endsection
