@extends('layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
	<div class="alert alert-warning" role="alert">
		The table is currently empty, to upload data follow <a href="/import">this link</a>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Grid</h1>
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
		  <thead>
		    <tr>

		      <th class="th-sm">Name
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		      <th class="th-sm">Email
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		      <th class="th-sm">Birthdate
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		      <th class="th-sm">CPF
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		      <th class="th-sm">Adress
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		      <th class="th-sm">CEP
		        <i class="fa fa-sort float-right" aria-hidden="true"></i>
		      </th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <td>Tiger Nixon</td>
		      <td>System Architect</td>
		      <td>Edinburgh</td>
		      <td>61</td>
		      <td>2011/04/25</td>
		      <td>$320,800</td>
		    </tr>
		    </tbody>
		  <tfoot>
		    <tr>
		      <th>Name
		      </th>
		      <th>Email
		      </th>
		      <th>Birthdate
		      </th>
		      <th>CPF
		      </th>
		      <th>Adress
		      </th>
		      <th>CEP
		      </th>
		    </tr>
		  </tfoot>
		</table>
	</div>
</div>
@endsection