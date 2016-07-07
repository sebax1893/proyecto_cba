@extends('layouts.app')
@section('title', 'Gestionar parentesco')

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('parentesco.create', $title = 'Registrar parentesco', null, $attributes = ['class'=>'btn btn-primary'])!!}
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
					@foreach($parentesco as $parentescos)
					<tr>
						<td>{{$parentescos->nombre}}</td>						
						<td>											
							{!!Form::open(['method' => 'delete', 'route' => ['parentesco.destroy', $parentescos->id_parentescos]])!!}
								{!!link_to_route('parentesco.edit', $title = 'Modificar', $parameters = $parentescos->id_parentescos, $attributes = ['class'=>'btn btn-success'])!!}
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
