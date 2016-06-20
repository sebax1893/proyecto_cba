@extends('layouts.app')
@section('title', 'Modificar tipo de banda')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar tipo de banda
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($tipoBanda, ['route'=> ['tipoBanda.update', $tipoBanda->id_tipo_bandas], 'method'=>'PATCH'])!!}

	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre')!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo nombre del tipo de banda'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
									</div>	    
								@endif
							</div>							
							
		                	{!!Form::submit('Modificar', ['class'=>'btn btn-primary'])!!}

	                	{!!Form::close()!!}
					    
			    	</div>
		    	</div>
	    	</div>
    	</div>
    	&nbsp;
    	<div class="row">
    		{!!link_to_route('tipoBanda.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection