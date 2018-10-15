@extends('layout')

@section('content')

@if(!empty($errors->first()))
    <div class="col-md-12 mt-5">
        <div class="alert alert-danger">
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif

@if(session()->has('success'))
	<div class="col-md-12 mt-5">
        <div class="alert alert-success">
            <span>{{ session()->get('success') }}</span>
        </div>
    </div>
@endif

<div class="row">
	
	<div class="col-md-12 mt-5">
		<div class="card">
		    <div class="card-header lighten-1 white-text">Import</div>
		    <div class="card-body">
		        <h4 class="card-title">Select File</h4>
		        <form method="POST" action="/import" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
				    <input type="file" class="form-control-file" id="file" name="file" aria-describedby="fileInput">
			  	</div>
			  	<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		    </div>
		</div>
		
	</div>	

</div>

@endsection