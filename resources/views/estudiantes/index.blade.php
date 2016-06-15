@extends('layouts.app')
@section('title', 'Index Estudiantes')
@section('content')
	<div class="jumbotron">
		<table id="dataTable" class="display" cellspacing="0" width="100%">

<thead>

<tr><th>Nombre de usuario</th><th>Correo electrónico</th><th>Operación</th></tr>

</thead>

 <tbody>

@foreach($users as $user)

	 
	  	<tr><td>{{$user->name}}</td>
	  	<td>{{$user->email}}</td>
	  	<td></td></tr>
	  
@endforeach

</tbody>

</table>
	</div>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#dataTable').dataTable();
			} );
		</script>
@endsection