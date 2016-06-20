@extends('layouts.app')
@section('title', 'Registrar categoría')
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
	                	Registrar categoría
                	</div>
	                <div class="panel-body">

	                	{!!Form::open(['route'=>'categoria.store', 'method'=>'POST'])!!}
	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre', ['class' => 'required'])!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre de la categoría'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
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
    		{!!link_to_route('categoria.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>    

@endsection