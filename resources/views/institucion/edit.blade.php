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
	                	{!!Form::model($institucion, ['route'=> ['institucion.update', $institucion->municipios->id_municipios, $institucion->id_institucions], 'method'=>'PATCH'])!!}

	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre')!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo nombre de la institución'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
									</div>	    
								@endif
							</div>	

							{!!Form::select('municipios', $municipios, null,['id' => 'category', 'class' => 'form-control'])!!}
							
							<div class="form-group">
								{!!Form::label('resenha', 'Reseña histórica', ['class' => ''])!!}
								{!!Form::textarea('resenha',null,['class'=>'form-control', 'placeholder'=>'Reseña histórica de la institución'])!!}
								@if ($errors->has('resenha'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('resenha') }}</strong>	    
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
    		{!!link_to_route('institucion.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection