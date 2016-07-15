@extends('layouts.app')
@section('title', 'Perfil de estudiante')
@section('content')

	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
                    <h3>Perfil de estudiante</h3>
                </div>								

				<div class="jumbotron text-center">
					<h2>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</h2>
					<img src="../../storage/images/{{$estudiante->foto}}" style="width:100px;" />
					<p>
						<strong>Tipo de documento:</strong> {{ $estudiante->tipo_documentos->nombre }}<br>
						<strong>Número de documento:</strong> {{ $estudiante->numeroIdentificacion }}<br>
						<strong>Edad:</strong> {{ $estudiante->edad }}<br>
						<strong>Fecha de nacimiento:</strong> {{ $estudiante->fechaNacimiento }}<br>
						<strong>Dirección:</strong> {{ $estudiante->direccion }}<br>
						<strong>Municipio:</strong> {{ $estudiante->municipios->nombre }} <strong>Subregión:</strong> {{ $estudiante->municipios->subregions->nombre }}<br>
						<strong>Barrio:</strong> {{ $estudiante->barrio }}<br>
						<strong>Teléfono:</strong> {{ $estudiante->telefono }}<br>
						@if ($estudiante->celular)
							<strong>Celular:</strong> {{ $estudiante->celular }}<br>
						@endif
						<strong>Correo:</strong> {{ $estudiante->correo }}<br>
						<strong>EPS:</strong> {{ $estudiante->eps->nombre }}<br>
						@if ($estudiante->observaciones)
				        	<strong>Observaciones:</strong> {{ $estudiante->observaciones }}<br>
				        @endif
						<div class="panel panel-info">
							<div class="panel-heading">
				                <p>Parientes</p>
				            </div>
				            <div class="panel-body">
								@foreach ($estudiante->parientes as $pariente)
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
					        </div>
				        </div>

				        <div class="panel panel-info">
							<div class="panel-heading">
				                <p>Bandas</p>
				            </div>
				            <div class="panel-body">
								@foreach ($estudiante->bandas as $banda)
						            <p>			            			
										@foreach ($bb as $bandis)
											@foreach ($bandis->estudiantes as $ids)	
												@if ($banda->id_bandas == $ids->pivot->id_bandas)	
													@if($estudiante->id_estudiantes == $ids->pivot->id_estudiantes)		
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
					        </div>
				        </div>		
				        {!!link_to_route('estudiante.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success btn-lg'])!!}		        
					</p>
				</div>				
		   </div>
	    </div>
	</div>

@endsection