@extends('layouts.app')
@section('title', 'Gestionar estudiantes')
@section('content')
<div class="container">
	@if (Auth::user()->is_admin == 1)
	<div class="row">
		<div class="">
			{!!link_to_route('estudiante.create', $title = 'Registrar estudiante', null, $attributes = ['class'=>'btn btn-primary'])!!}
		</div>
	</div>
	@endif


	
	&nbsp;
	<div class="row">
		
		<div class="">
			<table class="table table-striped table-bordered" id="dataTable">
				<thead>
					<th>Expandir</th>
					<th>Tipo de documento</th>
					<th>Número de identificación</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Edad</th>
					<th>Fecha de nacimiento</th>
					<th>Dirección</th>
					<th>Municipio</th>
					<th>Barrio</th>
					<th>Número de teléfono</th>
					<th>Número celular</th>
					<th>Correo</th>
					<th>EPS</th>					
					<th>Parientes</th>				
					<th>Bandas</th>				
					<th>Foto</th>				
					<th>Opciones</th>
				</thead>
				<tbody>
					@foreach($estudiante as $estudiantes)
					<tr>	
						<td></td>		
						<td>{{$estudiantes->tipo_documentos->nombre}}</td>				
						<td>{{$estudiantes->numeroIdentificacion}}</td>				
						<td>{{$estudiantes->nombres}}</td>				
						<td>{{$estudiantes->apellidos}}</td>				
						<td>{{$estudiantes->edad}}</td>				
						<td>{{$estudiantes->fechaNacimiento}}</td>				
						<td>{{$estudiantes->direccion}}</td>				
						<td>{{$estudiantes->municipios->nombre}}</td>				
						<td>{{$estudiantes->barrio}}</td>				
						<td>{{$estudiantes->telefono}}</td>										
						<td>{{$estudiantes->celular}}</td>										
						<td>{{$estudiantes->correo}}</td>										
						<td>{{$estudiantes->eps->nombre}}</td>					
						<td>	
							@foreach ($estudiantes->parientes as $pariente)
					            <p>
			            			@foreach($pp as $pari)
										@foreach ($pari->estudiantes as $ids)										
											@if ($pariente->id_parientes == $ids->pivot->id_parientes)
												@if ($ids->pivot->es_representante == 1)
													<span class="label label-danger">Representante legal</span>
												@endif
											@endif															
										@endforeach	
									@endforeach	
									<b>Nombre:</b> {{$pariente->nombre}}, 
						            <b>Parentesco:</b> {{$pariente->parentescos->nombre}},									
						            <b>Contacto:</b> {{$pariente->telefono}},
					            </p>
					        @endforeach 
						</td>		
						<td>	
							@foreach ($estudiantes->bandas as $banda)
					            <p>			            			
									<b>Nombre:</b> {{$banda->nombre}}						            
					            </p>
					        @endforeach 
						</td>
						<td><img src="data:image/jpeg;base64,base64_encode({{$estudiantes->foto}})" /></td>
						<td>															
							{!!Form::open(['method' => 'delete', 'route' => ['banda.destroy', $estudiantes->id_estudiantes]])!!}
								{!!link_to_route('banda.edit', $title = 'Modificar', $parameters = $estudiantes->id_estudiantes, $attributes = ['class'=>'btn btn-success'])!!}	
								{!!link_to_route('banda.show', $title = 'Detalles', $parameters = $estudiantes->id_estudiantes, $attributes = ['class'=>'btn btn-info'])!!}							
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
