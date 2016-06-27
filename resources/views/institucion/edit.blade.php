@extends('layouts.app')
@section('title', 'Modificar institución')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar institución
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($institucion, ['route'=> ['institucion.update', $institucion->id_institucions], 'method'=>'PATCH'])!!}

	                		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre', ['class' => 'required'])!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo nombre de la institución'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
									</div>	    
								@endif
							</div>	

							<div class="form-group">
								{!!Form::label('direccion', 'Dirección', ['class' => 'required'])!!}
								{!!Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Ingresar la dirección de la institución'])!!}
								@if ($errors->has('direccion'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('direccion') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('telefono', 'Teléfono', ['class' => 'required'])!!}
								{!!Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'Ingresar el teléfono de la institución'])!!}
								@if ($errors->has('telefono'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('telefono') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
	                            {!!Form::label('id_municipios', 'Municipio', ['class' => 'required'])!!}
	                            {!!Form::select('id_municipios', $municipio, $institucion->id_municipios, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}	                            
	                            @if ($errors->has('id_municipios'))
	                                <div class="list-group-item list-group-item-warning">       
	                                    <strong>{{ $errors->first('id_municipios') }}</strong>       
	                                </div>      
	                            @endif
	                        </div> 			

	                        <div class="form-group" id="subregionDiv">
	                            {!!Form::label('subregion', 'Subregión', ['class' => ''])!!}
	                            {!!Form::text('subregion',null,['class'=>'form-control', 'placeholder'=>'Subregión', 'disabled'])!!}                          
	                        </div>																	
							
		                	{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}

	                	{!!Form::close()!!}
					    
			    	</div>
		    	</div>
	    	</div>
    	</div>
    	&nbsp;
    	<div class="row">
    		{!!link_to_route('institucion.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection
@section('scripts')
	<script type="text/javascript">

		$(function () {

			var subregionInput = $('#subregion');
			var subregionDiv = $('#subregionDiv')
			// subregionDiv.css('display', 'none');

			// $(document).on('change','#multiid',function(){
			//     alert('Change Happened');
			// });
            var displaySubregion = function (e) {

                var municipioDropDownValue = $('#id_municipios').val();
                
                var token = $("#token").val();

                $.ajax({
                	headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    // url: "http://localhost/proyecto_cba/public/institucion/obtenerSubregion",
                    url: "/proyecto_cba/public/institucion/obtenerSubregion",
                    data: {id_municipio: municipioDropDownValue},
                    dataType: 'json',
                    success: function(data){

                    	if ($.trim(data)) {
	                    	var subregion = data[0].nombre;	                    	
		               		subregionInput.val(subregion);           
	               		}
		            }
                });
            };

            $('#id_municipios')
            	.change(displaySubregion)
            	.ready(displaySubregion)
        });
	</script>
@endsection