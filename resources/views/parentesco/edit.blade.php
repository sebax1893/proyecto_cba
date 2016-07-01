@extends('layouts.app')
@section('title', 'Modificar parentesco')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar parentesco
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($parentesco, ['route'=> ['parentesco.update', $parentesco->id_parentescos], 'method'=>'PATCH'])!!}

	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre', ['class' => 'required'])!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar nuevo nombre del parentesco'])!!}
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
    		{!!link_to_route('parentesco.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection