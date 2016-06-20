@extends('layouts.app')
@section('title', 'Gestionar tipo de banda')

<!-- @if(Session::has('message'))
	<div class="alert">
		{{Session::get('message')}}
	</div>
@endif -->

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('tipoBanda.create', $title = 'Registrar tipo de banda', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered" id="dataTable">
				<thead>
					<th>Nombre</th>					
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($tipoBanda as $tipoBandas)
					<tr>
						<td>{{$tipoBandas->nombre}}</td>						
						<td>											
							{!!Form::open(['method' => 'delete', 'route' => ['tipoBanda.destroy', $tipoBandas->id_tipo_bandas]])!!}
								{!!link_to_route('tipoBanda.edit', $title = 'Modificar', $parameters = $tipoBandas->id_tipo_bandas, $attributes = ['class'=>'btn btn-success'])!!}
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
				// No permitir ordenar la columna de Operación
				"aoColumnDefs": [
					{ 'bSortable': false, 'aTargets': [ 1 ] }
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
