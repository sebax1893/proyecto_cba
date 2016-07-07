@extends('layouts.app')
@section('title', 'Gestionar instituciones')

<!-- @if(Session::has('message'))
	<div class="alert">
		{{Session::get('message')}}
	</div>
@endif -->

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('institucion.create', $title = 'Registrar institución', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered" id="dataTable">
				<thead>
					<th>Nombre</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Municipio</th>					
					<th>Subregión</th>					
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($institucion as $institucions)
					<tr>
						<td>{{$institucions->nombre}}</td>
						<td>{{$institucions->direccion}}</td>
						<td>{{$institucions->telefono}}</td>
						<td>{{$institucions->municipios->nombre}}</td>			
						<td>{{$institucions->municipios->subregions->nombre}}</td>			
						<td>											
							{!!Form::open(['method' => 'delete', 'route' => ['institucion.destroy', $institucions->id_institucions]])!!}
								{!!link_to_route('institucion.edit', $title = 'Modificar', $parameters = $institucions->id_institucions, $attributes = ['class'=>'btn btn-success'])!!}								
					            {{Form::button('Eliminar', ['class' => 'btn btn-danger'])}}					            
							{!!Form::close()!!}
						</td>								
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>	

	</div>

</div>

@endsection

@section('scripts')

	<script type="text/javascript">

		$(function() {
			$('#dataTable').dataTable({
				// No permitir ordenar la columna de Opciones
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 3 ] }
				],
				// Usar el lenguaje español
				"oLanguage": {
				  "sUrl": "Espaniol.json"				  
				}			
			});
		});		

	</script>

@endsection
