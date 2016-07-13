@extends('layouts.app')
@section('title', 'Gestionar usuarios')

@section('content')
<div class="container">

	<div class="row">
		<div class="">
			{!!link_to_route('usuario.create', $title = 'Registrar usuario', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered" id="dataTable">
				<thead>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Es administrador</th>
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
																					
						@if($user->is_admin == 1)
							<td>Sí</td>
						@else
							<td>No</td>
						@endif
						<td>
							
							<!-- {!!Form::open(['method' => 'delete', 'route' => ['usuario.destroy', $user->id_users], 'id'=>'form'.$user->id_users])!!}					 -->
							{!!Form::open(['method' => 'delete', 'route' => ['usuario.destroy', $user->id]])!!}					
								{!!link_to_route('usuario.edit', $title = 'Modificar', $parameters = $user->id, $attributes = ['class'=>'btn btn-success'])!!}
					            <!-- {{Form::button('<i class="glyphicon glyphicon-trash"></i> Eliminar', array('type' => '', 'class' => 'btn btn-danger', 'data-id' => $user->id_users))}} -->
					            {{Form::button('Eliminar', ['id' => 'btnBorrar', 'class' => 'btn btn-danger'])}}
					            <!-- <input type="button" value="" class="btn btn-danger" data-id="asd" /> -->
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
				},
				// Para iniciar siempre la tabla con la columna de Es Administrador ordenada descendentemente para mostrar 
				// primero las cuentas con rol administrador
				"aaSorting": [[2,'desc']]	
			});
		});			
		
	</script>

@endsection
