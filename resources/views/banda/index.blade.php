@extends('layouts.app')
@section('title', 'Gestionar bandas')

<!-- @if(Session::has('message'))
	<div class="alert">
		{{Session::get('message')}}
	</div>
@endif -->

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('banda.create', $title = 'Registrar banda', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered display responsive" id="dataTable" cellspacing="0" width="100%">
				<thead>		
					<th>Expandir</th>
					<th>Nombre</th>																			
					<th>Categoría</th>															
					<th>Tipo de banda</th>
					<th>Institución</th>
					<th>Nombre representante legal</th>
					<th>Contacto representante legal</th>
					<th>Correo representante legal</th>
					<th>Nombre director</th>
					<th>Contacto director</th>
					<th>Correo director</th>
					<th>Municipio</th>
					<th>Subregión</th>
					<th>Reseña histórica</th>
					<th>Opciones</th>										
				</thead>
				<tbody>
					@foreach($banda as $bandas)
					<tr>			
						<td></td>						
						<td>{{$bandas->nombre}}</td>				
						<td>{{$bandas->categorias->nombre}}</td>										
						<td>{{$bandas->tipo_bandas->nombre}}</td>				
						<td>{{$bandas->institucions->nombre}}</td>										
						<td>{{$bandas->representante}}</td>										
						<td>{{$bandas->contacto_representante}}</td>										
						<td>{{$bandas->correo_representante}}</td>
						<td>{{$bandas->director}}</td>										
						<td>{{$bandas->contacto_director}}</td>										
						<td>{{$bandas->correo_director}}</td>										
						
						<td>{{$bandas->resena}}</td>	
						<td>											
							{!!Form::open(['method' => 'delete', 'route' => ['banda.destroy', $bandas->id_bandas]])!!}
								{!!link_to_route('banda.edit', $title = 'Modificar', $parameters = $bandas->id_bandas, $attributes = ['class'=>'btn btn-success'])!!}								
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
				responsive: true,				
				// No permitir ordenar la columna de Operación
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 0 ] }
				],		
				// Usar el lenguaje español
				"oLanguage": {
				  "sUrl": "Espaniol.json"				  
				}			
			});
		});				

	</script>

@endsection
