@extends('layouts.app')
@section('title', 'Registrar institución')
@section('styles')
	<!-- Estilo formulario -->
    <!-- {!!Html::style('../public/assets/css/style.css')!!} -->
@endsection
@section('content')	

	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Registrar institución
                	</div>
	                <div class="panel-body">

	                	{!!Form::open(['route'=>'institucion.store', 'method'=>'POST'])!!}
	                		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre', ['class' => 'required'])!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre de la institución'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
	                            {!!Form::label('id_municipios', 'Municipio', ['class' => 'required'])!!}
	                            
	                            {!!Form::select('id_municipios', $municipio, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
	                            @if ($errors->has('id_municipios'))
	                                <div class="list-group-item list-group-item-warning">       
	                                    <strong>{{ $errors->first('id_municipios') }}</strong>       
	                                </div>      
	                            @endif
	                        </div> 

	                        <div class="form-group">
	                            {!!Form::label('subregion', 'Subregión', ['class' => ''])!!}
	                            {!!Form::text('subregion',null,['class'=>'form-control', 'placeholder'=>'Subregión', 'disabled'])!!}                          
	                        </div>

							<div class="form-group">
								{!!Form::label('resenha', 'Reseña histórica', ['class' => 'required'])!!}
								{!!Form::textarea('resenha',null,['class'=>'form-control', 'placeholder'=>'Reseña histórica de la institución'])!!}
								@if ($errors->has('resenha'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('resenha') }}</strong>	    
									</div>	    
								@endif
							</div>
							
		                	{!!Form::submit('Registrar', ['class'=>'btn btn-primary'])!!}

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
            
            $('#id_municipios').change(function () {

                var municipioDropDownValue = $('#id_municipios').val();
                var subregionDropDown = $('#subregion');
                var token = $("#token").val();

                $.ajax({
                	headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    url: "prueba",
                    data: {id_municipio: municipioDropDownValue},
                    dataType: 'json',
                    success: function(response) {
				        // console.log("array: " + response + " nombre ? : " + response.response.nombre);
				        console.log(response);
				        // subregionDropDown.val(response.nombre);
				    }
                })
            });
        });
	</script>
@endsection