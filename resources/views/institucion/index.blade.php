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

		$('.btn-danger').click(function() {			

			var frm = $(this).closest("form"); // our form	

			swal({   
				title: "¿Esta seguro?",   
				text: "No va a poder recuperar otra vez este registro",   
				type: "warning",   showCancelButton: true,   
				confirmButtonColor: "#DD6B55",   
				confirmButtonText: "Sí, borrar",   
				cancelButtonText: "No, cancelar"
				// closeOnConfirm: false //
				}, 
				function(isConfirm){   
					if (isConfirm) {  
						frm.submit();						
					}
				});
		});    	
		
		var message = "{{ Session::get('message') }}"		

		if ("{{ Session::has('message') }}") {
			swal(
				message, 
				"", 
				"success"
				)
		}

	</script>

@endsection
