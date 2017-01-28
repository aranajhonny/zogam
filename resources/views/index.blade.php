@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Mi Vehículo <span></span></div>

				<div class="panel-body">
					<p>Intoduzca la Matricula del vehículo</p>

					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="fa fa-search"></span> Buscar!</button>
						</span>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
