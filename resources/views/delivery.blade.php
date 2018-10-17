@extends('layout')

@section('content')

<div class="row mt-5">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<form action="/delivery-routes" method="post">
					{{ csrf_field() }}
					<h2 class="card-title">Delivery routes configuration</h2>
					<div class="form-group">
						<label for="start" class="col-form-label">Starting point</label>
						<input type="start" class="form-control" name="start" id="start" placeholder="Avenida Dr. Gastão Vidigal, 1132 - Vila Leopoldina - 05314-010" required>
						<div class="start-feedback"></div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Generate routes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@if(!empty($routes))
<div class="row mt-5">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title">Routes</h2>
				<p><b>Initial:</b> {{$routes[0]}}</p>
				@foreach($routes as $route)
					@if(!empty($route['logradouro']))
						<p><i class="fa fa-truck"></i> {{$route['logradouro']}}, {{$route['numero']}} - {{$route['bairro']}}</p>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif

@endsection()