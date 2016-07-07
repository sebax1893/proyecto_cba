@extends('layouts.app')
@section('title', 'Gestionar tipos de documento')

<!-- @if(Session::has('message'))
	<div class="alert">
		{{Session::get('message')}}
	</div>
@endif -->

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('tipoDocumento.create', $title = 'Registrar tipo de documento', null, $attributes = ['class'=>'btn btn-primary'])!!}
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
					@foreach($tipoDocumento as $tipoDocumentos)
					<tr>
						<td>{{$tipoDocumentos->nombre}}</td>						
						<td>											
							{!!Form::open(['method' => 'delete', 'route' => ['tipoDocumento.destroy', $tipoDocumentos->id_tipo_documentos]])!!}		
								{!!link_to_route('tipoDocumento.edit', $title = 'Modificar', $parameters = $tipoDocumentos->id_tipo_documentos, $attributes = ['class'=>'btn btn-success'])!!}
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

	</script>

@endsection
