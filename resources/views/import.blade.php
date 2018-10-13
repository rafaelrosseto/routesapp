@extends('layout')

@section('content')

<div class="row">
	
	<div class="col-md-12">
		<h1>Import</h1>
		<form method="POST" action="/import">
		{{ csrf_field() }}
		<div class="form-group">
		    <label for="fileInput">File</label>
		    <input type="file" class="form-control-file" id="file" name="file" aria-describedby="fileInput">
	  	</div>
	  	<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>	

</div>

@endsection