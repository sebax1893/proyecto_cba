@extends('layouts.app')
@section('title', 'Modificar banda')
@section('content')
	<div class="container">
    	<div class="row">
        	<div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	Modificar banda
	                </div>
	                <div class="panel-body">
	                	{!!Form::model($banda, ['route'=> ['banda.update', $banda->id_bandas], 'method'=>'PATCH'])!!}

	                		<div class="form-group">
	                            {!!Form::label('id_institucions', 'Institución', ['class' => 'required'])!!}
	                            
	                            {!!Form::select('id_institucions', $institucion, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
	                            @if ($errors->has('id_institucions'))
	                                <div class="list-group-item list-group-item-warning">       
	                                    <strong>{{ $errors->first('id_institucions') }}</strong>       
	                                </div>      
	                            @endif
	                        </div>

	                        <div class="form-group">
	                            {!!Form::label('id_categorias', 'Categoría', ['class' => 'required'])!!}
	                            
	                            {!!Form::select('id_categorias', $categoria, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
	                            @if ($errors->has('id_categorias'))
	                                <div class="list-group-item list-group-item-warning">       
	                                    <strong>{{ $errors->first('id_categorias') }}</strong>       
	                                </div>      
	                            @endif
	                        </div>

	                        <div class="form-group">
	                            {!!Form::label('id_tipo_bandas', 'Tipo de banda', ['class' => 'required'])!!}
	                            
	                            {!!Form::select('id_tipo_bandas', $tipoBanda, null, ['placeholder' => 'Seleccionar', 'class' => 'form-control'])!!}
	                            @if ($errors->has('id_tipo_bandas'))
	                                <div class="list-group-item list-group-item-warning">       
	                                    <strong>{{ $errors->first('id_tipo_bandas') }}</strong>       
	                                </div>      
	                            @endif
	                        </div>

	                		<div class="form-group">
								{!!Form::label('nombre', 'Nombre', ['class' => 'required'])!!}
								{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre de la banda'])!!}
								@if ($errors->has('nombre'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('nombre') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('representante', 'Representante legal', ['class' => 'required'])!!}
								{!!Form::text('representante',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre del representante legal de la banda'])!!}
								@if ($errors->has('representante'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('representante') }}</strong>	    
									</div>	    
								@endif
							</div>		

							<div class="form-group">
								{!!Form::label('contacto_representante', 'Teléfono/celular del representante legal', ['class' => 'required'])!!}
								{!!Form::number('contacto_representante',null,['class'=>'form-control', 'placeholder'=>'Ingresar el contacto del representante legal de la banda'])!!}
								@if ($errors->has('contacto_representante'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('contacto_representante') }}</strong>	    
									</div>	    
								@endif
							</div>		

							<div class="form-group">
								{!!Form::label('correo_representante', 'Correo electrónico del representante legal', ['class' => 'required'])!!}
								{!!Form::email('correo_representante',null,['class'=>'form-control', 'placeholder'=>'Ingresar el correo electrónico del representante legal de la banda'])!!}
								@if ($errors->has('correo_representante'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('correo_representante') }}</strong>	    
									</div>	    
								@endif
							</div>			

							<div class="form-group">
								{!!Form::label('director', 'Director', ['class' => 'required'])!!}
								{!!Form::text('director',null,['class'=>'form-control', 'placeholder'=>'Ingresar el nombre del director de la banda'])!!}
								@if ($errors->has('director'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('director') }}</strong>	    
									</div>	    
								@endif
							</div>		

							<div class="form-group">
								{!!Form::label('contacto_director', 'Teléfono/celular del director', ['class' => 'required'])!!}
								{!!Form::number('contacto_director',null,['class'=>'form-control', 'placeholder'=>'Ingresar el contacto del director de la banda'])!!}
								@if ($errors->has('contacto_director'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('contacto_director') }}</strong>	    
									</div>	    
								@endif
							</div>		

							<div class="form-group">
								{!!Form::label('correo_director', 'Correo electrónico del director', ['class' => 'required'])!!}
								{!!Form::email('correo_director',null,['class'=>'form-control', 'placeholder'=>'Ingresar el correo electrónico del director de la banda'])!!}
								@if ($errors->has('correo_director'))
									<div class="list-group-item list-group-item-warning">		
								        <strong>{{ $errors->first('correo_director') }}</strong>	    
									</div>	    
								@endif
							</div>

							<div class="form-group">
								{!!Form::label('resenha', 'Reseña histórica', ['class' => 'required'])!!}
								{!!Form::textarea('resenha',null,['class'=>'form-control', 'placeholder'=>'Reseña histórica de la banda'])!!}
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
    		{!!link_to_route('banda.index', $title = 'Regresar', null, $attributes = ['class'=>'btn btn-success'])!!}
    	</div>
	</div>
@endsection