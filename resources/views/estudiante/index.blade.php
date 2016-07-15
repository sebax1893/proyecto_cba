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
					<th>Det.</th>
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
					<th>Observaciones</th>				
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
			            			@foreach ($pp as $pari)
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
						            <b>Contacto:</b> {{$pariente->telefono}}.
					            </p>
					        @endforeach 
						</td>		
						<td>	
							@foreach ($estudiantes->bandas as $banda)
					            <p>			            			
									@foreach ($bb as $bandis)
										@foreach ($bandis->estudiantes as $ids)	
											@if ($banda->id_bandas == $ids->pivot->id_bandas)	
												@if($estudiantes->id_estudiantes == $ids->pivot->id_estudiantes)		
													@if ($ids->pivot->asiste == 1)
														<span class="label label-danger">Asiste actualmente</span>
													@endif		
												@endif
											@endif												
										@endforeach	
									@endforeach		
									<b>Nombre:</b> {{$banda->nombre}}.											           
					            </p>
					        @endforeach 
						</td>
						<td>{{$estudiantes->observaciones}}</td>						
						<td>
							<img src="../storage/images/{{$estudiantes->foto}}" style="width:100px;" />
						</td>
						<td>															
							{!!Form::open(['method' => 'delete', 'route' => ['estudiante.destroy', $estudiantes->id_estudiantes]])!!}
								{!!link_to_route('estudiante.edit', $title = 'Modificar', $parameters = $estudiantes->id_estudiantes, $attributes = ['class'=>'btn btn-success'])!!}	
								{!!link_to_route('estudiante.show', $title = 'Detalles', $parameters = $estudiantes->id_estudiantes, $attributes = ['class'=>'btn btn-info'])!!}							
					            {{Form::button('Eliminar', ['id' => 'btnBorrar', 'class' => 'btn btn-danger'])}}					            
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
					{ 'bSortable': false, 'aTargets': [ 0, 3 ] }
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

		// $('#btnBorrar').click(function() {	
		// 	e.preventDefault();
		// 	console.log('sdasdas');
		// });	

		// $('#dataTable').on('click', '#btnBorrar' , function (e) {
  //       e.preventDefault();
  //      	console.log('sdasdas');
  //   });

	</script>

@endsection
